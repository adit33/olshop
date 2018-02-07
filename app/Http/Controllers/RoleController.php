<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

use App\Models\Role;

use App\DataTables\RoleDataTable;

class RoleController extends Controller
{
	public function __construct(Role $role){
		$this->role=$role;
	}

	public function index(RoleDataTable $dataTable){
		return $dataTable->render('backend.role.index');
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

    public function edit($id){
    	$role=Role::find($id);
    	$permissions=Permission::all();
    	return view('backend.role.edit',compact('role','permissions'))
    	->with('title','Edit Role');
    }

    public function update($id,Request $request){
    	$role=Role::find($id);
    	$this->role->saveRole($role,$request);
    	return redirect()->route('role.index');
    }
}
