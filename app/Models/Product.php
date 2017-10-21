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

    public function saveProduct($request){
        $product=new Product;
        $product_image=new ProductImage;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->save();
        $product->addCategoriesProduct($request->input('category_id'));

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $image=$product_image->saveImage($image);
                ProductImage::create(['name'=>$image,'product_id'=>$product->id]);
            }
        }  
    }

    public function addCategoriesProduct($category_id){

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
