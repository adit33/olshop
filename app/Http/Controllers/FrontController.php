<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class FrontController extends Controller
{
    public function frontPage(){
    	$products=Product::with('productImage')->get();
    	return view('welcome',compact('products'));
    }

    public function home(){
    	return view('home');
    }

    public function viewProduct(){
    	$product=Product::findOrFail($id);
    	
    }
}
