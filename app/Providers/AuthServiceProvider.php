<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define('admin', function () {
            if(Auth::user()->hasRole('Administrador')){
            //if ($user->role == 'Administrador'){
                return true;
            }

            return false;

        });
        Gate::define('afiliado', function () {

            if(Auth::user()->hasRole('Afiliado')){
                return true;
            }

            return false;

        });
        Gate::define('admin-afiliado', function () {
            if(Auth::user()->hasRole('Administrador') or Auth::user()->hasRole('Afiliado') ){
                return true;
            }

            return false;

        });
        //
    }
}
