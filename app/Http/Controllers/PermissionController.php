<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

class PermissionController extends Controller
{
	public function __construct(){

	}

    public function index(Permission $permission){
    	$this->permission=$permission;
    }

    public function create(){
    	return view('backend.permission.create')
    	->with('title','Create Permission');
    }

    public function store(Request $request){
    	$permission = new Permission;
    	$this->permission->savePermission($request,$permission)
    }
}
