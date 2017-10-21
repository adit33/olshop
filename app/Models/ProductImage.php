<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;
class ProductImage extends Model
{
	protected $table='product_images';
	protected $id	='id';
	protected $fillable=['id','name','product_id'];

    public function saveImage($file){
         if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $image=$product_image->saveImage($image);
                ProductImage::create(['name'=>$image,'product_id'=>$product->id]);
            }
        }
        
    	$path='img';
    	$ext=$file->getClientOriginalExtension();
    	$name=str_random(10).'.'.$ext;
    	$image=Image::make($file);
    	$image->save($path.DIRECTORY_SEPARATOR.$name);

    	return $path.DIRECTORY_SEPARATOR.$name;
    }

    public function removeImage($id){
        $image=ProductImage::find($id);
        $image->delete();
    }
}
