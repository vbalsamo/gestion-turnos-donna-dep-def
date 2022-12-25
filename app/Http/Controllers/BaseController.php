<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function boot()
    {
        $tratamientos_base = DB::select("SELECT * FROM tratamiento");

        View::share('tratamientos_base', $tratamientos_base);
    }
}
