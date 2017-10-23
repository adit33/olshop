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

    public function productImage(){
    	return $this->hasMany(ProductImage::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
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

}
