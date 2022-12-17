<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tratamientos/tratamientosIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamientos/createTratamiento');
    }

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'nombre' => ['required'],
            'descripcion' => ['required']
        ])->validate();
    }

    private function storeTratamiento(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::insert('INSERT INTO tratamiento (nombre, descripcion) values (?, ?)', [
                $request->post("nombre"),
                $request->post("descripcion")
            ]);
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request);
        try {
            $this->storeTratamiento($request);
            return redirect(route('tratamientos.index'));
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tratamiento = DB::selectOne("SELECT * FROM tratamiento WHERE id = {$id}");
        return view('tratamientos/showTratamiento', [
            "tratamiento" => $tratamiento
        ]);
    }

    //Mostrar todos los tratamientos
    public function showAll()
    {
        $tratamientos = DB::select("SELECT * FROM tratamiento");
        return $tratamientos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = DB::selectOne("SELECT * FROM tratamiento WHERE id = {$id}");
        return view('tratamientos/createTratamiento', [
            "tratamiento" => $tratamiento
        ]);
    }

    private function updateTratamiento(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            DB::table('tratamiento')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->post('nombre'),
                    'descripcion' => $request->post('descripcion')
                ]);
        });
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
        $this->validar($request);
        try {
            $this->updateTratamiento($request, $id);
            return redirect()->route('tratamientos.index');
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                DB::update("UPDATE tratamientoxprofesional SET activo = 0 WHERE id_tratamiento = {$id}");
                DB::update("UPDATE tratamiento SET activo = 0 WHERE id = {$id}");
            });

            return redirect()->route('tratamientos.index');

        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

    }
}
