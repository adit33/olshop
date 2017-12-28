<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

use App\Models\Role;

class RoleController extends Controller
{
	public function __construct(Role $role){
		$this->role=$role;
	}

    public function create(){
    	$permissions=Permission::all();
    	return view('backend.role.create')
    	->with('title','Create Role')
    	->with('permissions',$permissions);
    }

    public function store(Request $request){
    	$role=new Role;
    	$this->role->saveRole($role,$request);
    }
}
