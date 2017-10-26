<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@frontPage');

Route::get('test',function(){
	$p=App\Models\Product::find(5);
	$p=$p->productImage()->pluck('id');



	foreach ($p as $x) {
		echo dd($x);
	}
});

Route::GET('register',['uses'=>'AuthController@register']);

Route::GET('login',['uses'=>'AuthController@login','as'=>'login']);

Route::POST('login',['uses'=>'AuthController@auth','as'=>'auth']);

Route::middleware(['auth.basic'])->group(function () {

	Route::resource('product','ProductController',['except'=>['update']]);

	Route::POST('product/{id}',['uses'=>'ProductController@update','as'=>'product.update']);

	Route::resource('user','UserController');

	Route::GET('logout',['uses'=>'AuthController@logout','as'=>'logout']);

	Route::POST('addtocart/{product_id}',['uses'=>'TransactionController@addToCart','as'=>'addtocart']);

	Route::GET('cart','TransactionController@getCart');

	Route::resource('category','CategoryController');

});