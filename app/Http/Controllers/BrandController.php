<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;

use App\DataTables\BrandDataTable;

class BrandController extends Controller
{	
	public function index(BrandDataTable $dataTable){
		return $dataTable->render('backend.brand.index');
	}

    public function create(){
    	return view('backend.brand.create')
    	->withTitle('create Brand');
    }

    public function store(Request $request){
    	Brand::create($request->all());
    	return redirect()->route('brand.index');
    }

    public function edit($id){
    	$brand=Brand::find($id);
    	return view('backend.brand.edit',compact('brand'));
    }

    public function update(Request $request){
    	$brand=Brand::find($id);
    	$brand->name=$request->input('name');
    	$brand->save();

    	return redirect()->route('brand.index');	
    }

    public function destroy($id){
    	$brand=Brand::find($id);
    	$brand->delete();

    	return redirect()->route('brand.index');		
    }



}
