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
            return $user->hasAnyRoles(['admin','candidate','delegate']); 
        });
        //call of gates to give permissions to users
        Gate::define('edit-users', function($user){
            return $user->hasRole(['admin']); 
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin'); 
        });
        Gate::define('can-view-schools', function($user){
            return $user->hasAnyRoles(['delegate','candidate','admin']); 
        });
        Gate::define('can-be-elected', function($user){
            return $user->hasAnyRoles(['delegate','candidate']); 
        });
        Gate::define('can-vote', function($user){
            return $user->hasAnyRoles(['candidate','delegate','student']); 
        });
        Gate::define('vote-in-candidates', function($user){
            return $user->hasRole('delegate'); 
        });
        Gate::define('voted-in-as-candidates', function($user){
            return $user->hasRole('candidate'); 
        });

    }
}
