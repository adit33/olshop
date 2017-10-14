<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
    	return view('backend.category.create')
    	->withTitle('Add Category');
    }
}
