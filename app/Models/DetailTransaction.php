<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cart;
use App\Models\Product;

class DetailTransaction extends Model
{
    protected $table='detail_transaction';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['id','product_id','qty','price','transaction_id'];

    public function addDetailTransaction($transaction){
    	$product=new Product;
        $carts=Cart::content();
    	foreach ($carts as $cart) {
    		DetailTransaction::create([
				'transaction_id' =>$transaction->id,
				'product_id'     =>$cart->id,
				'qty'            =>$cart->qty,
				'price'          =>$cart->price
    		]);
            $product->decrementStock($cart->id,$cart->qty);
    	}
    }
}
