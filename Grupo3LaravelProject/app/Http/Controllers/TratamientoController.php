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
        $tratamientos = DB::select(
            "SELECT * FROM tratamiento");
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
            DB::transaction(function () use ($request) {
                DB::insert('INSERT INTO tratamiento (nombre, descripcion) values (?, ?)', [
                    $request->post("nombre"),
                    $request->post("descripcion")
                ]);
            });

            //return redirect(route('tratamientos.index'));
            return $request->post('id');
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = DB::selectOne("SELECT * FROM tratamiento WHERE id = {$id}");
        return view('tratamientos/editTratamiento', [
            "tratamiento" => $tratamiento
        ]);
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
        try{
            DB::table('tratamiento')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->post('nombre'),
                    'descripcion' => $request->post('descripcion')
                ]);
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();

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
        try{

            DB::table('tratamiento')->delete($id);

        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

    }
}
