<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $primaryKey='id';
    protected $fillable=['id','name'];


    public function saveRole($role,$request){
    	$permission_id=$request->input('permission_id');
    	$role->name=$request->input('name');
    	$role->save();

		foreach ($permission_id as $id) {
			$role->permissions()->attach($id);
		}

    }

    public function permissions(){
    	return $this->belongsToMany(Permission::class);
    }

}
