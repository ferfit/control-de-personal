<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //
        Gate::define('administrador', function ($user) {
            if ($user->rol == 'administrador'){
                return true;
            }
            return false;
        });
        Gate::define('socio', function ($user) {
            if ($user->rol == 'socio'){
                return true;
            }
            return false;
        });
        Gate::define('empleado', function ($user) {
            if ($user->rol == 'empleado'){
                return true;
            }
            return false;
        });

    }
}
