<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use App\Models\Product;

use App\Models\ProductImage;

use App\DataTables\ProductDataTable;

class ProductController extends Controller
{
	public function index(ProductDataTable $dataTable){
		return $dataTable->render('backend.product.index');
	}

    public function create(){
    	return view('backend.product.create')
    	->withTitle('Add Product');
    }

    public function store(ProductRequest $request){
    	$product_image=new ProductImage;
    	$data=$request->all();
    	$product=Product::create($data);

    	if ($request->hasFile('file')) {
	    	foreach ($request->file('file') as $image) {
	    		$image=$product_image->saveImage($image);
	    		ProductImage::create(['name'=>$image,'product_id'=>$product->id]);
    		}
    	}    	
    }

    public function show($id){
        $product=Product::findOrFail($id);
        return view('frontend.product.show',compact('product'));
    }
}
