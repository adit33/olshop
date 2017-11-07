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


// $client = new \GuzzleHttp\Client();
// $headers = ['key' => 'f1499fdd21ba4442c850525be31cac5a'];
// $body = 'Hello!';
// $res = $client->request('GET', 'https://api.rajaongkir.com/starter/province>id=12',$headers,$body);
// echo $res->getStatusCode();
// // 200
// echo $res->getHeaderLine('content-type');
// // 'application/json; charset=utf8'
// echo $res->getBody();
// '{"id": 1420053, "name": "guzzle", ...}'


    // $client = new GuzzleHttp\Client([
    // 'base_uri'=>"https://api.rajaongkir.com",
    // 'headers' => [
    //     'User-Agent' => 'testing/1.0',
    //     'Accept'     => 'application/json',
    //     'X-Foo'      => ['Bar', 'Baz'],
    //     'key'		 =>'f1499fdd21ba4442c850525be31cac5a'
    // ]
    // ]);

    // // $response = $client->createRequest("GET", $url, ['headers' => [
    // //     'User-Agent' => 'testing/1.0',
    // //     'Accept'     => 'application/json',
    // //     'X-Foo'      => ['Bar', 'Baz'],
    // //     'key'		 =>'f1499fdd21ba4442c850525be31cac5a'
    // // ]]);


    // $response = $client->get('starter/province');


    // dd($response);



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: f1499fdd21ba4442c850525be31cac5a"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  return $response;
}

});

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