<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\UserRequest;

use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable){
    	return $dataTable->render('backend.user.index');
    }

    public function create(){
    	return view('backend.user.create')
    	->withTitle('Create User');
    }

    public function store(UserRequest $request){
    	$data=$request->all();
    	$data['password']=bcrypt($request->input('password'));
    	User::create($data);
    }
}
