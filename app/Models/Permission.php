<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    protected $table='Permission';
    protected $primaryKey='id';
    protected $fillable=['id','name'];


    public function savePermission(Permission $permission,$request){
    	$permission->name=$request->input('name');
    	$permission->save();
    }

}
