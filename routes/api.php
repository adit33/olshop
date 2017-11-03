<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products','ProductController@getProducts');

Route::get('product/{id}',function($id){
	return App\Models\Product::find($id)->stock;
});

Route::get('products/search','ProductController@searchProducts');

Route::get('categories',['uses'=>'CategoryController@getCategories','as'=>'categories']);

Route::get('products/filter','ProductController@filterProducts');

