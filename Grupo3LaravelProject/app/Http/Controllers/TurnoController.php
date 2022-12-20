<?php

namespace App\Http\Controllers;

use App\Mail\EnviarTurno;
use App\Mail\RecordatorioTurno;
use App\Models\Turno\Mes;
use App\Models\Turno\Turno;
use App\Models\Usuario\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $siguientes3meses =  (new MesController())->siguientes3Meses(Carbon::now()->month);
        return view('calendarioSelect', [
            'siguientes3meses'=>$siguientes3meses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::update('UPDATE turno SET cliente = ?, proximo = 1 WHERE id = ?', [
                $request->post("clienteId"),
                $request->post("turnoId")
            ]);
        });

        $turno = DB::selectOne('SELECT turno WHERE id = {$request->post("turnoId")}');

        $this->enviarMailReserva($turno);
    }

    public function enviarMailReserva(Turno $turno)
    {
        $usuarioPrueba = Auth::user();
        Mail::to($usuarioPrueba->getEmail())->send(new EnviarTurno($turno));
    }

    private function matchDiaDeHoy(Turno $turno){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $currentDate = date('d/m/y');
        return ($turno->getDiaId() == $currentDate);
    }

    private function matchDiaDeAyer(Turno $turno){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $currentDate = date('d/m/y', strtotime("-1 days"));
        return ($turno->getDiaId() == $currentDate);
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

        $turnos = DB::select("SELECT * FROM turno");
        array_filter($turnos, "matchDiaDeAyer");

        foreach($turnos as &$turno){
            $turno->setProximo(false);
        }
    }

    private function filtrarTurnos($turno){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $clienteId = Auth::id();
        $cliente = DB::select("SELECT * FROM cliente WHERE id = $clienteId");


        //real
        $turnos = DB::select("SELECT * FROM turno WHERE dia_id = {$request->post('diaId')}");
        $turnosFav = DB::select("SELECT * FROM turno WHERE profesional = {$cliente -> $profesionalPreferido}");

        //prueba
        //$turnosFiltrados = [new Turno("1", "09:00", "", "Mary", "Depi", "Bera"),
            //new Turno("1", "10:00", "", "chiara", "facial", "Capital")];
        //$turnosFav = [new Turno("1", "11:00", "", "Josefina", "Depi", "Lanus")];

        $turnosFiltrados = array_filter($turnos, function($turno) use ($request) {
            return $turno->locacion == $request->session()->get('locacionActual') && $turno->tratamiento == $request->session()->get('tratamientoActual');
        });

        $turnosFavFiltrados = array_filter($turnosFav, function($turno) use ($request) {
            return $turno->locacion == $request->session()->get('locacionActual') && $turno->tratamiento == $request->session()->get('tratamientoActual');
        });

        return view('turnos', [
            "turnosFav" => $turnosFavFiltrados,
            "turnosFiltrados" => $turnosFiltrados
        ]);
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
