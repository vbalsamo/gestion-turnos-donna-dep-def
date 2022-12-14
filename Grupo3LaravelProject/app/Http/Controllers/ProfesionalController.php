<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'nombre' => ['alpha_spaces'],
            'numero_tel' => ['required', 'numeric'],
            'email' => ['required', 'email']
        ])->validate();
    }

    private function storeProfesional(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::insert('INSERT INTO profesional (nombre, numero_tel, email) values (?, ?, ?)', [
                $request->post("nombre"),
                $request->post("numero_tel"),
                $request->post("email")
            ]);
            $idProfesional = DB::getPdo()->lastInsertId();
            foreach ($request->post("tratamientos") as $idTratamiento) {
                DB::insert('INSERT INTO tratamientoxprofesional (id_tratamiento, id_profesional) values (?, ?)', [
                    $idTratamiento,
                    $idProfesional
                ]);
            }
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
            $this->storeProfesional($request);
            return redirect(route('profesionales.index'));
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
        }
    }

    public static function tratamientosProfesional($id)
    {
        return DB::select("SELECT tratamiento.* FROM (profesional INNER JOIN tratamientoxprofesional ON profesional.id = tratamientoxprofesional.id_profesional)
        INNER JOIN tratamiento ON tratamientoxprofesional.id_tratamiento = tratamiento.id
        WHERE profesional.id = {$id} AND tratamiento.activo = 1");
    }

    public static function idTratamientosProfesional($id)
    {
        return DB::select("SELECT tratamiento.id FROM (profesional INNER JOIN tratamientoxprofesional ON profesional.id = tratamientoxprofesional.id_profesional)
        INNER JOIN tratamiento ON tratamientoxprofesional.id_tratamiento = tratamiento.id
        WHERE profesional.id = {$id} AND tratamiento.activo = 1");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesional = DB::selectOne("SELECT * FROM profesional WHERE id = {$id}");
        return view('profesionales/showProfesional', [
            "profesional" => $profesional
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
        $profesional = DB::selectOne("SELECT * FROM profesional WHERE id = {$id}");
        return view('profesionales/createProfesional', [
            "profesional" => $profesional,
            "tratamientosProfesional" => $this->tratamientosProfesional($profesional->id)
        ]);
    }

    private function updateTratamientosProfesional($tratamientos, $id)
    {
        if ($tratamientos != null) {
            $tratamientosProfesional = $this->idTratamientosProfesional($id);
            $idsTratamientos = [];
            foreach ($tratamientosProfesional as $tratamientoAnterior) {
                array_push($idsTratamientos, $tratamientoAnterior->id);
                if (!in_array($tratamientoAnterior->id, $tratamientos)) {
                    DB::delete("DELETE from tratamientoxprofesional WHERE id_profesional = {$id} AND id_tratamiento = {$tratamientoAnterior->id}");
                }
            }
            foreach ($tratamientos as $idTratamiento) {
                if (!in_array($idTratamiento, $idsTratamientos)) {
                    DB::insert('INSERT INTO tratamientoxprofesional (id_tratamiento, id_profesional) values (?, ?)', [
                        $idTratamiento,
                        $id
                    ]);
                }
            }

        } else {
            DB::delete("DELETE from tratamientoxprofesional WHERE id_profesional = {$id}");
        }

    }

    private function updateProfesional(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            DB::table('profesional')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->post('nombre'),
                    'numero_tel' => $request->post('numero_tel'),
                    'email' => $request->post('email'),
                ]);
            $this->updateTratamientosProfesional($request->post('tratamientos'), $id);
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
            $this->updateProfesional($request, $id);
            return redirect()->route('profesionales.index');
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
                DB::delete("DELETE from tratamientoxprofesional WHERE id_profesional = {$id}");
                DB::update("UPDATE profesional SET activo = 0 WHERE id = {$id}");;
            });
            return redirect()->route('profesionales.index');

        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
