<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ImageHelper;
use File;
class ProductImage extends Model
{
	protected $table='product_images';
	protected $id	='id';
	protected $fillable=['id','name','product_id'];

    public function saveImage($file,$product_id){
            foreach ($file as $image) {               
                $image_name=ImageHelper::storeImage($image);
                ProductImage::create(['name'=>$image_name,'product_id'=>$product_id]);
        }
    }

    public function removeImage($attachment_id){
        
          foreach ($attachment_id as $id) {  
            $image=ProductImage::find($id);
            ImageHelper::destroyImage($image->name);
            $image->delete();            
        }

    }

}
