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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Comprobar si un usuario tiene el rol de administrador al arrancar la App
        Gate::define('isAdmin', function($user) {            
           return $user->hasRole('admin');
        });
        Gate::define('read', function ($user, $tipo) {
            return $user->hasRole('admin') || $tipo == 'incidence';//Leer incidence tienen todos acceso
        });
    }
}
