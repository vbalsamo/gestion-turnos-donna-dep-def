<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('admin-auth')) return view('turnosAdmin.crearTurnoAdmin');
        else return abort(403);
    }

    private function crearDia($fecha){
        $date = strtotime($fecha);
        $dia_num = date('d', $date);
        $dia_mes = date('m', $date);
        $dia_anio = date('Y', $date);
        $datetime = DateTime::createFromFormat('d/m/Y', $fecha);
        $nombre_dia =  CalendarioController::traducirDia($datetime->format('l'));
        $dia = DB::selectOne("SELECT * FROM dia WHERE dia_num = {$dia_num} AND dia_mes = {$dia_mes} AND dia_anio = {$dia_anio}");
        if($dia == null){
            DB::insert('INSERT INTO dia (dia_num, dia_mes, dia_anio, dia_nom) values (?, ?, ?, ?)', [
                $dia_num,
                $dia_mes,
                $dia_anio,
                $nombre_dia
            ]);
            return DB::getPdo()->lastInsertId();
        }
        else{
            return $dia->id;
        }
    }

    private function storeTurno(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::insert('INSERT INTO turno (hora, id_tratamiento, id_locacion, id_profesional, dia_id) values (?, ?, ?, ?, ?)', [
                $request->post('hora'),
                $request->post('tratamiento'),
                $request->post('locacion'),
                $request->post('profesional'),
                $this->crearDia($request->post('fecha'))
            ]);
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validar($request);
        try {
            $this->storeTurno($request);
            return redirect(route('turnosAdmin.create'));
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            dd($exception);
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
