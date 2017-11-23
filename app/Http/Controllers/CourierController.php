<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RajaOngkirHelper;
class CourierController extends Controller
{
    public function getCourier(Request $request){
		$origin      =$request->input('origin');
		$destination =$request->input('destination');
		$weight      =$request->input('weight');
		$courier     =$request->input('courier');
		$url         ='origin='.$origin.'&destination='.$destination.'&weight='.$weight.'&courier='.$courier;
    		return RajaOngkirHelper::postCost($url);	
    }
}
