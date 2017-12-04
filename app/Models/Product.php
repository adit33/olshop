<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\ProductImage;

class Product extends Model
{
    protected $table='product';
    protected $primaryKey='id';
    protected $fillable=['name','description','price'];
    public $timestamp=true;

    use Searchable;

    protected static function boot(){
        self::deleting(function($product){
            $product_image=new ProductImage;

            $product->categories()->detach();
            $product_image->removeImage($product->productImage()->pluck('id'));
            $product->productImage()->delete();
        });
    }

    public function productImage(){
    	return $this->hasMany(ProductImage::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function detailTransaction(){
        return $this->hasMany(DetailTransaction::class,'product_id','id');
    }

    public function saveProduct($product,$request){
        $product_image=new ProductImage;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->save();
        $product->addCategoriesProduct($request->input('category_id'));

        if ($request->hasFile('file')) {
            $product_image->saveImage($request->file('file'),$product->id);
        }  

        if($request->input('attachment_id')){
            $product_image->removeImage($request->input('attachment_id'));
        }
    }

    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
    }

    public function addCategoriesProduct($category_id){
        // if has categories detach all first
        if($this->categories()){
            $this->categories()->sync($category_id);
        }

        foreach($category_id as $id){
            $this->categories()->attach($id);
        }
        
    }

    public function categoriesProduct(){
        $arr=[];
        foreach ($this->categories as $category) {
            array_push($arr, $category->id);
        }
        return $arr;
    }

    public function decrementStock($id,$value){
        Product::find($id)->decrement('stock',$value);    
    }

    public function incrementStock($id,$value){
        Product::find($id)->increment('stock',$value);    
    }

    public function productSold(){
         $sum=0;
         foreach($this->detailTransaction as $p){
            $sum += $p->qty;
         }
         return $sum;
    }

}
