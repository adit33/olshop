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
        $categories_id=$request->input('category_id');
    	$product=Product::create($data);

        foreach ($categories_id as $category_id) {
            $product->categories()->attach($category_id);
        }

        

    	if ($request->hasFile('file')) {
	    	foreach ($request->file('file') as $image) {
	    		$image=$product_image->saveImage($image);
	    		ProductImage::create(['name'=>$image,'product_id'=>$product->id]);
    		}
    	}    	
    }

    public function show($id){
        $product=Product::with('productImage')->findOrFail($id);
        return view('frontend.product.show',compact('product'));
    }

    public function getProducts(){
        $products=Product::with('productImage')->paginate(3);
        return response()->json($products);       
    }

    public function searchProducts(Request $request){
        $value=$request->input('val');
         $products=Product::search($value)->paginate(3);
         $products->load('productImage');
        return response()->json($products);  
    }
}
