<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;
class AuthController extends Controller
{
    public function login(){
    	return view('frontend.layout.login');
    }

    public function auth(Request $request){
    	$email=$request->input('email');
    	$password=$request->input('password');
    	 if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('product');
        }
        return redirect()
        ->back()
        ->withErrors('email dan password tidak cocok');
    }
}
