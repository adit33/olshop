<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
    	return view('backend.product.create')
    	->withTitle('Add Product');
    }
}
