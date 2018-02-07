<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Traits\SocialCheckService;
use App\Http\Controllers\Controller;
 
class SocialiteController extends Controller
{
     use SocialCheckService;
     public function register($provider)
     {
         return Socialite::driver($provider)->redirect();
     }
 
     public function registered(Request $request, $provider)
     {
         if(isset($request->error))
             return redirect()
                 ->to('login');
         try {
             $userProvider = Socialite::driver($provider)->stateless()->user();
             $user = $this->checkUser($userProvider, $provider);
             auth()->login($user);
             return redirect()
                 ->to('/');
             // $user->token;
         } catch (Exception $e) {
             return redirect()
                 ->to('login');
         }
     }
}
