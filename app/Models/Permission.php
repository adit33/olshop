<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    protected $table='permission';
    protected $primaryKey='id';
    protected $fillable=['id','name'];


    public function savePermission(Permission $permission,$request){
    	$permission->name=$request->input('name');
    	$permission->save();
    }

    public function roles(){
    	return $this->belongsToMany(Role::class);
    }

}
