<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('tratamientos_global', DB::select("SELECT * FROM tratamiento WHERE activo = 1"));

        View::share('locaciones_global', DB::select("SELECT * FROM locacion WHERE activo = 1"));

        View::share('profesionales_global', DB::select("SELECT * FROM profesional WHERE activo = 1"));

        View::share('meses_global', DB::select("SELECT * FROM mes WHERE activo = 1"));

        Validator::extend('alpha_spaces', function ($attribute, $value){
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Gate::define('verificar_admin', function ($usuario){

        }) ;
    }
}
