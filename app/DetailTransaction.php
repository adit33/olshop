<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class DetailTransaction extends Model
{
    protected $table='detail_transaction';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['id','product_id','qty','price','transaction_id'];

    public function addCart($data){
    	Cart::add($data);
    }
}
