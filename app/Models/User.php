<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;
    protected $table='user';
    protected $primaryKey='id';
    // public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function saveUser($user,$request){
        $role           =$request->input('role');
        $user->name     =$request->input('name');
        $user->email    =$request->input('email');
        $user->password =bcrypt($request->input('password'));
        $user->save();

        if(isset($user->id)){
            $user->syncRole($role);
        }else{
            $user->assignRole($role);    
        }        

    }

     public function socialAccount(){
         return $this->hasMany(SocialAccount::class);
     }

     public function roles(){
        return $this->belongsToMany(Role::class);
     }

     public function hasRole($name){
        foreach($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }

        return false;
     }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
 
        return $this->roles()->attach($role);
    }
 
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
 
        return $this->roles()->detach($role);
    }

    public function syncRole($roles){
         return $this->roles()->sync($roles);
    }
}
