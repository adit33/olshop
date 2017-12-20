<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='role';
    protected $primaryKey='id';
    protected $fillable=['id','name'];

    public function permissions(){
    	return $this->belongsToMany(Role::class);
    }

}
