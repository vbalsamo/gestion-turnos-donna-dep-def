<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('password.editPassword');
    }

    private function updatePassword(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            DB::table('cliente')
                ->where('id', $id)
                ->update([
                    'password' => Hash::make($request->post('new_password'))
                ]);
        });
    }

    private function validar(Request $request)
    {
        return Validator::make($request->post(), [
            'old_password' => ['required', Password::min(8)],
            'new_password' => ['required', Password::min(8), 'confirmed'],
            'new_password_confirmation' => ['required']
        ])->validate();
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
        try{
            $old_password_db = DB::selectOne("SELECT password FROM cliente WHERE id = {$id}")->password;

            if(Hash::check($request->post('old_password'), $old_password_db))
            {
                $this->updatePassword($request, $id);
                return redirect()->back()->with('alert', 'Contraseña actualizada correctamente');
            }
            else {
                return back()->withErrors([
                    'old_password' => 'Contraseña anterior incorrecta'
                ]);
            }
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
        //
    }
}
