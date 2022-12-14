<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'email' => ['required', 'email'],
            'password' => ['required']
            //TODO: 'activo'=> true;
        ])->validate();
    }

    public function store(Request $request)
    {
        $this->validar($request);

        try {
            if (Auth::attempt([
                'email' => $request->post('email'),
                'password' => $request->post('password'),
            ])) {
                $request->session()->regenerate();

                return redirect()->intended(route('home'));
            } else {
                return back()->withErrors([
                    'email' => 'El email no existe en la base de datos',
                    'password' => 'La contraseña no coincide con el email/nombre de usuario proporcionado'
                ]);
                //NO COINCIDE NOMBRE DE USUARIO Y/O CONTRASEÑA
            }
        } catch (ValidationException $ex) {

        } catch (\Exception $exception) {

        }


    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->intended(route('login.index'));
    }
}
