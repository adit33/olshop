<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RajaOngkirHelper;

class CityController extends Controller
{
    public function getCity(Request $request){
    	$id=$request->input('id');
    	$url='city?province='.$id;

    	if($id != null){
    		return RajaOngkirHelper::getData($url);	
    	}
    	
    }
}
