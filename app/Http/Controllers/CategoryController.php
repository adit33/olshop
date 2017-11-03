<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
    	return view('backend.category.create')
    	->withTitle('Add Category');
    }


    public function getCategories(){
    	$categories=Category::all();
    	return $categories->toJson();
    }
}
