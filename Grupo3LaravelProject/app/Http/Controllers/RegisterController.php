<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'password' => ['required', Password::min(8)],
            'password_confirmation' => ['required']
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
            $email = $request->post('email');
            $usuarioDuplicado = DB::selectOne("SELECT email FROM cliente WHERE email = '{$email}'");
            if($usuarioDuplicado == null){
                DB::insert('INSERT INTO cliente (email,password,nombre,numero_tel) values (?,?,?,?)', [
                    $request->post('email'),
                    Hash::make($request->post('password')),
                    $request->post('nombre'),
                    $request->post('numero_tel')
                ]);
                return view('login');
            }
            else{
                return view('register')->withErrors([
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
        //
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
