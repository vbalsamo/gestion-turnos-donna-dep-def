<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesController extends Controller
{
    public function siguienteMes($mes)
    {
        if($mes < 12){
            return $mes + 1;
        }
        else return 1;
    }

    public function siguientes3Meses($mes){
        $siguentes = [];
        $mesActual = $mes;
        for($i=0; $i < 4; $i++){
            $siguentes[] = $mesActual;
            $mesActual = $this->siguienteMes($mesActual);
        }
        return $siguentes;
    }

    public function showAll()
    {
        $tratamientos = DB::select("SELECT * FROM tratamiento");
        return $tratamientos;
    }
}
