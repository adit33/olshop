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

    	if(is_null($role->permissions())){
    		foreach ($permission_id as $id) {
				$role->permissions()->attach($id);
			}		
    	}else{
				$role->permissions()->sync($permission_id);
		}


		

    }

    public function addPermissionRole(){

    }

    public function permissions(){
    	return $this->belongsToMany(Permission::class);
    }

}
