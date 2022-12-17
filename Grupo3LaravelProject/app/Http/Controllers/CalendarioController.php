<?php

namespace App\Http\Controllers;

use App\Models\Turno\Dia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('calendarioSelect');
    }

    public function show(Request $request){
        //Se guardan los ids

        //real
        //$request->session()->put('tratamientoActual', $request->input('tratamiento'));
        //$request->session()->put('locacionActual', $request->input('locacion'));

        //prueba
        $request->session()->put('tratamientoActual', 1);
        $request->session()->put('locacionActual', 1);

        //real
        //$dias = DB::select("SELECT * FROM dia WHERE mesid = {$request -> input('mes')}");

        //prueba
        //$dias = DB::select("SELECT * FROM dia WHERE mesid = 1");
        $dias = [ new Dia("1", "martes"), new Dia("2", "miercoles")];


        return view('calendario', [
            "dias" => $dias
        ]);
    }

}
