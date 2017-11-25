<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RajaOngkirHelper;
class ProvinceController extends Controller
{
    public function getProvince(){
    	$url='province';
    	return RajaOngkirHelper::getData($url);
    }
}
