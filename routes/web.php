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

Route::resource('product','ProductController');

Route::resource('user','UserController');

Route::GET('register',['uses'=>'AuthController@register']);

Route::GET('login','AuthController@login');

Route::POST('login',['uses'=>'AuthController@auth','as'=>'auth']);

Route::GET('logout',['uses'=>'AuthController@logout','as'=>'logout']);

Route::POST('addtocart/{product_id}',['uses'=>'TransactionController@addToCart','as'=>'addtocart']);

Route::GET('cart','TransactionController@getCart');


