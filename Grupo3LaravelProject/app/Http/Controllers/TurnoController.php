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

    public static function horariosLibres ($dia){
        return DB::select("SELECT * FROM turno WHERE dia_id = {$dia} AND id_cliente is NULL");
    }

    public function elegirHorario(Request $request){
        return view('turnos',[
            'locacion' => $request->post('locacion'),
            'tratamiento' => $request->post('tratamiento'),
            'mes' => $request->post('mes'),
            'dia' => $request->post('dia')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        try {
            $idTurno = $request->post("turnoId");
            DB::transaction(function () use ($request) {
                DB::update('UPDATE turno SET id_cliente = ?, activo = 1 WHERE id = ?', [
                    Auth::id(),
                    $request->post("turnoId")
                ]);
            });
            $turno = DB::selectOne("SELECT * FROM turno WHERE id = {$idTurno}");
            $this->enviarMailReserva($turno);
            $id = Auth::id();
            $turnos = DB::select("SELECT * FROM turno WHERE id_cliente = {$id}");
            return view('cliente.indexTurno', [
                'turnos' => $turnos,
            ]);
        } catch (\Exception $exception) {

        }

        /*$id_turno = $request->post("turnoId");
        $turno = DB::selectOne("SELECT * FROM turno WHERE id = {$id_turno}");
        $id_dia = $turno->dia_id;
        $dia = DB::selectOne("SELECT * FROM dia WHERE id = {$id_dia}");
        return view('cliente.indexTurno',[
            'turno' => $turno,
            'dia' => $dia
        ]);*/
    }

    public static function traducirHorario($hora){
        $horario = [
            '1' => '9 a 10',
            '2' => '10 a 11',
            '3' => '11 a 12',
            '4' => '12 a 13',
            '5' => '13 a 14',
            '6' => '14 a 15',
            '7' => '15 a 16',
            '8' => '16 a 17',
            '9' => '17 a 18'
        ];
        return $horario[$hora];
    }

    public function enviarMailReserva($turno)
    {
        try {
            $tratamiento = DB::selectOne("SELECT nombre FROM tratamiento WHERE id = {$turno->id_tratamiento}")->nombre;
            $dia = DB::selectOne("SELECT * FROM dia WHERE id = {$turno->dia_id}");
            $fecha = $dia->dia_nom . ", " . $dia->dia_num . " del " . $dia->dia_mes;
            $hora = $this->traducirHorario($turno->hora);
            $clienteObj = DB::selectOne("SELECT nombre, email FROM cliente WHERE id = {$turno->id_cliente}");
            $cliente = $clienteObj->nombre;
            $profesional = DB::selectOne("SELECT nombre FROM profesional WHERE id = {$turno->id_profesional}")->nombre;
            $locacion = DB::selectOne("SELECT ciudad FROM locacion WHERE id = {$turno->id_locacion}")->ciudad;
            $turnoSend = new Turno($fecha, $hora, $cliente, $profesional, $tratamiento, $locacion);
             Mail::to($clienteObj->email)->send(new EnviarTurno($turnoSend));
        } catch (\Exception $e) {

        }

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
