<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
class CartController extends Controller
{
    public function addToCart(Request $request,$id){
    	$product=Product::with('productImage')->find($id);

        $rules = [
            'qty'=>'required|numeric|between:0,'.$product->stock
        ];

        $this->validate($request,$rules);

    	$data['id']=$product->id;
    	$data['name']=$product->name;
    	$data['qty']=$request->input('qty');
    	$data['price']=$product->price;
        $data['options']['image']=$product->productImage->first()->name;

    	Cart::add($data);
	   	return redirect('cart');
    }

    public function getCart(){
    	// $carts=Cart::content();
    	return view('frontend.product.cart');
    }

    public function getCarts(){
        $carts=Cart::content();
        $qty=Cart::count();
        return $carts;
    }

    public function removeItem($id){
        Cart::remove($id);
        // return redirect()->back();
    }

    public function updateItem($id,Request $request){
        Cart::update($id, $request->input('qty'));
        // return redirect()->back();
        return Cart::content();
    }
}
