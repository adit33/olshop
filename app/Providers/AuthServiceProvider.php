<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;
use App\Models\User;

use App\Policies\UserPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
         User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->registerPolicies();

        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name,function($user) use($permission){
                return $user->hasRole($permission->roles);
            });
        }

        // Gate::define('user.index','App\Policies\UserPolicy@index');

    }

    public function getPermissions(){
        return $permissions=Permission::all();
    }
}
