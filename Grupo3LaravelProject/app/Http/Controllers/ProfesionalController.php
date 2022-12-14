<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profesionales.profesionalesIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesionales.createProfesional');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public static function tratamientosProfesional($id)
    {
        return DB::select("SELECT tratamiento.* FROM (profesional INNER JOIN tratamientoxprofesional ON profesional.id = tratamientoxprofesional.id_profesional)
        INNER JOIN tratamiento ON tratamientoxprofesional.id_tratamiento = tratamiento.id
        WHERE profesional.id = {$id}");
    }

    public static function nombreTratamientosProfesional($id)
    {
        $listaNombres = [];
        foreach ($this->tratamientosProfesional($id) as $fila){
            $listaNombres[] = $fila->nombre;
        }
        return $listaNombres;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*profesional = DB::selectOne("SELECT * FROM profesional WHERE id = {$id}");
        return view('profesionales/showProfesional', [
            "profesional" => $profesional
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
