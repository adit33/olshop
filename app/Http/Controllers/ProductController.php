<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function create(){
    	return view('backend.product.create')
    	->withTitle('Add Product');
    }

    public function store(ProductRequest $request){
    	$data=$request->all();
    	Product::create($data);
    }
}
