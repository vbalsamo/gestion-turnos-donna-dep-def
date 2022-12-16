<?php

namespace App\Http\Controllers;

use App\Mail\EnviarTurno;
use App\Mail\RecordatorioTurno;
use App\Models\Turno\Turno;
use App\Models\Usuario\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->enviarMailReserva();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function enviarMailReserva()
    {
        //aca debería cargarlo con el Request
        //Debería también guardarse el turno
        //cambiar los valores para que los tome como las propiedades de los objetos
        $turno = new Turno("01/01/01", "12:00", "Maria Perez", "Mary", "Depilacion Definitiva", "Berazategui");

        $usuarioPrueba = new User("gonzalorduarte@gmail.com");

        //real
        //Mail::to($request->user()->getEmail())->send(new EnviarTurno($turno));

        //prueba
        Mail::to($usuarioPrueba->getEmail())->send(new EnviarTurno($turno));
    }

    private function matchDiaDeHoy(Turno $turno){
        $currentDate = new Date();
        $currentDate->format('d/m/y');
        return ($turno->getFecha() == $currentDate);
    }

    public static function enviarMailRecordatorio(){

        //Testear
        $turnos = DB::select("SELECT * FROM turno");
        array_filter($turnos, "matchDiaDeHoy");

        foreach($turnos as &$turno){
            $email = DB::select("SELECT email FROM cliente WHERE nombre = {$turno->getCliente()->getNombre()}");
            Mail::to($email)->send(new RecordatorioTurno($turno));
        }
    }

    public static function actualizarEstadoTurnos(){
        //get todos los turnos del día anterior

        $turnos = [];

        foreach($turnos as &$turno){
            $turno->setProximo(false);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
