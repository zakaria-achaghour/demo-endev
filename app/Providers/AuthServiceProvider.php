<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // for the routes
        Gate::define('user.manage',function($user){
            return $user->hasRole('admin');
        });

        
       // for the future if you wanna add more actions 
        /*Gate::define('user.manage',function($user){
            return $user->hasAnyRoles(['admin']);
        });*/
    }
}
