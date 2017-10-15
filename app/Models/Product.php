<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


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
}
