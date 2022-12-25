<?php

namespace App\Http\Controllers;

use App\Mail\EnviarTurno;
use App\Mail\RegistroUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'nombre' => ['required', 'alpha_spaces'],
            'email' => ['required', 'email'],
            'numero_tel' => ['required', 'numeric'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'password_confirmation' => ['required']
        ])->validate();
    }

    private function storeCliente(Request $request){
        DB::transaction(function () use ($request) {
            DB::insert('INSERT INTO cliente (email,password,nombre,numero_tel) values (?,?,?,?)', [
                $request->post('email'),
                Hash::make($request->post('password')),
                $request->post('nombre'),
                $request->post('numero_tel')
            ]);
        });
        Mail::to($request->post('email'))->send(new RegistroUsuario());
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
            if (MailCheckController::mailNoRepetidoClienteNuevo($request->post('email'))) {
                $this->storeCliente($request);
                return view('login');
            } else {
                return back()->withErrors([
                    'email' => 'El email ya está registrado en la base de datos'
                ]);
            }


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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cliente.editarDatos');
    }

    private function validarUpdate(Request $request)
    {
        return Validator::make($request->post(), [
            'nombre' => ['required', 'alpha_spaces'],
            'email' => ['required', 'email'],
            'numero_tel' => ['required', 'numeric']
        ])->validate();
    }

    private function updateCliente(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            DB::table('cliente')
                ->where('id', $id)
                ->update([
                    'nombre' => $request->post('nombre'),
                    'numero_tel' => $request->post('numero_tel'),
                    'email' => $request->post('email')
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
        $this->validarUpdate($request);
        try {
            if (MailCheckController::mailNoRepetidoCliente($request->post('email'), $id)) {
                $this->updateCliente($request, $id);
                return redirect()->back()->with('alert', 'Datos actualizados correctamente.');
            } else {
                return view('cliente.editarDatos')->withErrors([
                    'email' => 'El email ya está registrado en la base de datos'
                ]);
            }
        } catch
        (ValidationException $ex) {

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
        //TODO: eliminar cuenta
    }
}
