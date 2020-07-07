<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
           // restricting ui access
           Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin','student']); 
        });
        //call of gates to give permissions to users
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin','student']); 
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin'); 
        });
    }
}
