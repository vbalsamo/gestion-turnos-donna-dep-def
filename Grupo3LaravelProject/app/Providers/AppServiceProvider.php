<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        View::share('tratamientos_global', DB::select("SELECT * FROM tratamiento"));

        View::share('locaciones_global', DB::select("SELECT * FROM locacion"));

        View::share('profesionales_global', DB::select("SELECT * FROM profesional"));

        Validator::extend('alpha_spaces', function ($attribute, $value){
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }
}
