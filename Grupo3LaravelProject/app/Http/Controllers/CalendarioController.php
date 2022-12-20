<?php

namespace App\Http\Controllers;

use App\Models\Turno\Dia;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('calendarioSelect');
    }

    public static function traducirDia($nombre){
        switch ($nombre) {
            case 'Monday':
                return "Lunes";
                break;
            case 'Tuesday':
                return "Martes";
                break;
            case 'Wednesday':
                return "Miercoles";
                break;
            case 'Thursday':
                return "Jueves";
                break;
            case 'Friday':
                return "Viernes";
                break;
            case 'Saturday':
                return "Sábado";
                break;
            case 'Sunday':
                return "Domingo";
                break;
        }
    }

    public function diasDisponibles($mes, $tratamiento){
        return DB::select("SELECT DISTINCT dia.id, dia.dia_num, dia.dia_nom FROM turno INNER JOIN dia ON turno.dia_id WHERE id_tratamiento = {$tratamiento} AND dia.dia_mes = {$mes} ORDER BY dia.dia_num");
    }

    public function show(Request $request){
        //Se guardan los ids

        //real
        $request->session()->put('mesTurno', $request->input('mes'));
        $request->session()->put('tratamientoActual', $request->input('tratamiento'));
        $request->session()->put('locacionActual', $request->input('locacion'));

        //real
        //$dias = DB::select("SELECT * FROM dia WHERE mesid = {$request -> input('mes')}");

        //prueba
        //$dias = DB::select("SELECT * FROM dia WHERE mesid = 1");

        //$dias = [ new Dia("1", "martes"), new Dia("2", "miercoles")];
        $dias = [];
        $mes = $request->post('mes');
        $anio = date("Y");
        $cantidadDeDias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
        for($i=1; $i <= $cantidadDeDias; $i++){
            $fecha = $i . '/' . $mes . '/' . $anio;
            $datetime = DateTime::createFromFormat('d/m/Y', $fecha);
            $nombreDia = $this->traducirDia($datetime->format('l'));
            $dias[] = new Dia($i, $nombreDia);
        }


        $diasDisponibles = [];
        foreach ($this->diasDisponibles($mes , $request->post('tratamiento')) as $diaDisponible){
            array_push($diasDisponibles, $diaDisponible);
        }

        return view('calendario', [

            'tratamiento' => $request->input('tratamiento'),
            'locacion' => $request->input('locacion'),
            'mes' => $mes,
            'diasDisponibles' => $diasDisponibles
        ]);
    }

}
