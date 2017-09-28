<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class FrontController extends Controller
{
    public function frontPage(){
    	$products=Product::all();
    	return view('welcome',compact('products'));
    }
}
