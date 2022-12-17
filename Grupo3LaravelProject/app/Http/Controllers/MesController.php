<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesController extends Controller
{
    public function showAll()
    {
        $tratamientos = DB::select("SELECT * FROM tratamiento");
        return $tratamientos;
    }
}
