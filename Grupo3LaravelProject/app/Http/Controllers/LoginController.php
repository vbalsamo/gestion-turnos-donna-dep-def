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
            'email' => ['required', 'email', 'alpha_num'],
            'password' => ['required']
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
                    'username' => 'El email/nombre de usuario no existe en la base de datos',
                    'password' => 'La contraseña no coincide con el email/nombre de usuario proporcionado'
                ]);
                //NO COINCIDE NOMBRE DE USUARIO Y/O CONTRASEÑA
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

    public function destroy($id)
    {
        //
    }
}
