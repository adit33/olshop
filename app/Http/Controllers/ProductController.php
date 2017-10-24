<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

use App\Models\Product;

use App\Models\ProductImage;

use App\DataTables\ProductDataTable;

class ProductController extends Controller
{

    public function __construct(Product $product){
        $this->product = $product;
    }

	public function index(ProductDataTable $dataTable){
		return $dataTable->render('backend.product.index');
	}

    public function create(){
    	return view('backend.product.create')
    	->withTitle('Add Product');
    }

    public function store(ProductRequest $request){
        $categories_id=$request->input('category_id');
        $product=new Product;
    	$this->product->saveProduct($product,$request);  	

        return redirect('product');
    }

    public function edit($id){
        $product=Product::with('categories','productImage')->find($id);
        return view('backend.product.edit',compact('product'))
        ->withTitle('Edit Product');
    }

    public function update($id,Request $request){
        $product=Product::find($id);
        $this->product->saveProduct($product,$request);  
        return redirect('product');   
    }

    public function show($id){
        $product=Product::with('productImage')->findOrFail($id);
        return view('frontend.product.show',compact('product'));
    }

    public function destroy($id){
        $this->product->deleteProduct($id);
        return redirect('product');
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

    public function filterProducts(Request $request){

        $order=$request->input('order');
        $categories=$request->input('categories');
        $arr_order=explode(',',$order);

        $products=Product::with('productImage','categories')
        ->when($categories,function($query) use ($categories){
            return $query->whereHas('categories',function($query) use ($categories){
                return $query->whereIn('category_id',$categories);
            });
        })
        ->when($order,function($query) use ($arr_order){
            return $query->orderBY($arr_order[0],$arr_order[1]);
        })
        ->paginate(3);
        

        return $products;
    }
}
