<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LocacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('locaciones.indexLocacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locaciones.createLocacion');
    }

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'ciudad' => ['required'],
            'calle' => ['required'],
            'altura'=> ['required', 'numeric'],
            'piso'=> ['nullable', 'numeric'],
            'depto'=> ['nullable', 'numeric']
        ])->validate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request);
        try {
            DB::transaction(function () use ($request) {
                DB::insert('INSERT INTO locacion (ciudad, calle, altura, piso, depto) values (?, ?, ?, ?, ?)', [
                    $request->post("ciudad"),
                    $request->post("calle"),
                    $request->post("altura"),
                    $request->post("piso"),
                    $request->post("depto")
                ]);
            });
            return redirect(route('locaciones.index'));
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {

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
        $locacion = DB::selectOne("SELECT * FROM locacion WHERE id = {$id}");
        return view('locaciones/showlocacion', [
            "locacion" => $locacion
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
        $locacion = DB::selectOne("SELECT * FROM locacion WHERE id = {$id}");
        return view('locaciones/createLocacion', [
            "locacion" => $locacion
        ]);
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
        $this->validar($request);
        try {
            DB::transaction(function () use ($request, $id) {
                DB::table('locacion')
                    ->where('id', $id)
                    ->update([
                        'ciudad' => $request->post('ciudad'),
                        'calle' => $request->post('calle'),
                        'altura' => $request->post('altura'),
                        'piso' => $request->post('piso'),
                        'depto' => $request->post('depto')
                    ]);
            });
            return redirect()->route('locaciones.index');
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                DB::table('locacion')->delete($id);
            });
            return redirect()->route('locaciones.index');

        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
