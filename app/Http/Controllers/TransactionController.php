<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\DetailTransaction;

use Cart;

class TransactionController extends Controller
{
    public function addToCart(Request $request,$id){
    	$product=Product::find($id);

        $rules = [
            'qty'=>'required|numeric|between:0,'.$product->stock
        ];

        $this->validate($request,$rules);

    	$data['id']=$product->id;
    	$data['name']=$product->name;
    	$data['qty']=$request->input('qty');
    	$data['price']=$product->price;

    	Cart::add($data);

    }

    public function getCart(){
    	$carts=Cart::content();
    	return view('frontend.product.cart',compact('carts'));
    }

    public function removeItem($id){
        Cart::remove($id);
        return->redirect()->back();
    }

    public function changeQty($id,Request $request){
        Cart::update($id, $request->input('qty'));
    }

}
