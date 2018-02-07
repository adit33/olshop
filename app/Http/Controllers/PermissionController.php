<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

use App\DataTables\PermissionDataTable;

class PermissionController extends Controller
{
	public function __construct(Permission $permission){
		$this->permission=$permission;
	}

    public function index(PermissionDataTable $dataTable){
        $title='Permissions';
    	return $dataTable->render('backend.permission.index',compact('title'));
    }

    public function create(){
    	return view('backend.permission.create')
    	->with('title','Create Permission');
    }

    public function store(Request $request){
    	$permission = new Permission;
    	$this->permission->savePermission($permission,$request);
    }

    public function edit($id){
        $permission=Permission::find($id);
        return view('backend.permission.edit',compact('permission'))
        ->with('title','Edit Permission '.$permission->name);
    }

    public function update(Request $request,$id){
        $permission=Permission::find($id);
        $this->permission->savePermission($permission,$request);
        return redirect()->route('permission.index');     
    }
}
