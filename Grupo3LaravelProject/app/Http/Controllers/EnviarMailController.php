<?php

namespace App\Http\Controllers;

use App\Mail\EnviarTurno;
use App\Models\Turno\Turno;
use App\Models\Usuario\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarMailController extends Controller
{
    /**
     * Ship the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enviarMail(Request $request)
    {
        //aca debería cargarlo con el Request
        //Debería también guardarse el turno
        //cambiar los valores para que los tome como las propiedades de los objetos
        $turno = new Turno("01/01/01", "12:00", "Maria Perez", "Mary", "Depilacion Definitiva", "Berazategui");

        $usuarioPrueba = new User("gonzalorduarte@gmail.com");

        //real
        //Mail::to($request->user())->send(new EnviarTurno($turno));

        //prueba
        Mail::to('gonzalorduarte@gmail.com')->send(new EnviarTurno($turno));
    }
}
