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
        $tratamientos = DB::select("SELECT * FROM tratamiento");
        View::share('tratamientos_global', $tratamientos);
        
        Validator::extend('alpha_spaces', function ($attribute, $value){
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }
}
