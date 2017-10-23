<?php 
namespace App\Helpers;
use File;
use Image;

class ImageHelper
{
	public static function storeImage($file){
        $path='img';
    	$ext=$file->getClientOriginalExtension();
    	$name=str_random(10).'.'.$ext;
    	$image=Image::make($file);
    	$image->save($path.DIRECTORY_SEPARATOR.$name);

    	return $path.DIRECTORY_SEPARATOR.$name;
    }
     	
	public static function destroyImage($name){
         File::delete(public_path().'/'.$name);		
	}
}
?>