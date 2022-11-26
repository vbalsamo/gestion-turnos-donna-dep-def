<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->post('usuario'),
            'password' => $request->post('contrasenia'),
        ])){
            $request->session()->regenerate();
            $request->session()->put('nro_telefono', '544475788796');

            return redirect()->intended(route('tecnicos.index'));
        }
        else {
            return back()->withErrors([
                'usuario' => 'El email/nombre de usuario no existe en la base de datos',
                'contrasenia' => 'La contraseña no coincide con el email/nombre de usuario proporcionado'
            ]);
            //NO COINCIDE NOMBRE DE USUARIO Y/O CONTRASEÑA
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
