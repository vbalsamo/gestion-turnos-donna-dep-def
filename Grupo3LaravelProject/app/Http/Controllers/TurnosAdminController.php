<?php

namespace App\Http\Controllers;

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
        return view('turnosAdmin.crearTurnoAdmin');
    }

    private function crearDia($fecha){
        $date = strtotime($fecha);
        echo date('m/d/Y', $date);
        $dia_num = date('d', $date);
        $dia_mes = date('m', $date);
        $dia_anio = date('Y', $date);
        $dia = DB::selectOne("SELECT * FROM dia WHERE dia_num = {$dia_num} AND dia_mes = {$dia_mes} AND dia_anio = {$dia_anio}");
        if($dia == null){
            DB::insert('INSERT INTO dia (dia_num, dia_mes, dia_anio) values (?, ?, ?)', [
                $dia_num,
                $dia_mes,
                $dia_anio
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
                $request->post("hora"),
                $request->post("tratamiento"),
                $request->post('locacion'),
                $request->post('profesional'),
                $this->crearDia($request->post('21/12/2022'))
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
            return redirect(route('tratamientos.index'));
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
