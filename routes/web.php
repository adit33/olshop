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

Route::get('province','ProvinceController@getProvince');

Route::get('city','CityController@getCity');

Route::GET('register',['uses'=>'AuthController@register']);

Route::GET('login',['uses'=>'AuthController@login','as'=>'login']);

Route::POST('login',['uses'=>'AuthController@auth','as'=>'auth']);

Route::resource('product','ProductController',['except'=>['update']]);

Route::GET('cart',['uses'=>'CartController@getCart','as'=>'cart']);

Route::GET('carts',['uses'=>'CartController@getCarts','as'=>'carts']);

Route::PUT('cart/{id}/update',['uses'=>'CartController@updateItem','as'=>'cart.update']);

Route::GET('cart/{id}/delete',['uses'=>'CartController@removeItem','as'=>'cart.delete']);

Route::POST('addtocart/{product_id}',['uses'=>'CartController@addToCart','as'=>'addtocart']);

Route::middleware(['auth'])->group(function () {

	

	Route::POST('product/{id}',['uses'=>'ProductController@update','as'=>'product.update']);

	Route::resource('user','UserController');

	Route::GET('logout',['uses'=>'AuthController@logout','as'=>'logout']);

	Route::resource('category','CategoryController');

});