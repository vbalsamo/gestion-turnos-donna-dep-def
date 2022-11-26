<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
//REALIZAR VALIDACIONES QUE APRENDIMOS

        if(Auth::attempt([
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ])){
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }
        else {
            return back()->withErrors([
                'username' => 'El email/nombre de usuario no existe en la base de datos',
                'password' => 'La contraseña no coincide con el email/nombre de usuario proporcionado'
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
