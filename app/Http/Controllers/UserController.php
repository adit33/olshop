<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\UserRequest;

use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function __construct(User $user){
        $this->user= $user;
    }

    public function index(UserDataTable $dataTable){
    	return $dataTable->render('backend.user.index');
    }

    public function create(){
    	return view('backend.user.create')
    	->withTitle('Create User');
    }

    public function store(UserRequest $request){
        $user=new User;
        $this->user->saveUser($user,$request);

        return redirect()->route('user.index');
    }

    public function edit($id,Request $request){
        $user=User::find($id);
        return view('backend.user.edit',compact('user'))
        ->with('title','Edit User');
    }

    public function update($id,Request $request){
        $user=User::find($id);
        $this->user->saveUser($user,$request);
        
        return redirect()->route('user.index');   
    }
}
