<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
class ProductImage extends Model
{
	protected $table='product_images';
	protected $id	='id';
	protected $fillable=['id','name','product_id'];

    public function saveImage($file){
    	$path='img';
    	$ext=$file->getClientOriginalExtension();
    	$name=str_random(10).'.'.$ext;
    	$image=Image::make($file);
    	$image->save($path.DIRECTORY_SEPARATOR.$name);

    	return $path.DIRECTORY_SEPARATOR.$name;
    }
}
