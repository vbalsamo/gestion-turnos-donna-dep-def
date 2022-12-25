<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailCheckController extends Controller
{
    public static function mailNoRepetidoClienteNuevo($email){
        $clienteDuplicado = DB::selectOne("SELECT email FROM cliente WHERE email = '{$email}'");
        $profesionalDuplicado = DB::selectOne("SELECT email FROM profesional WHERE email = '{$email}'");

        return ($clienteDuplicado == null && $profesionalDuplicado == null);
    }

    public static function mailNoRepetidoCliente($email, $id){
        $clienteDuplicado = DB::selectOne("SELECT email FROM cliente WHERE email = '{$email}'");
        $profesionalDuplicado = DB::selectOne("SELECT email FROM profesional WHERE email = '{$email}'
                                                    EXCEPT SELECT email FROM cliente WHERE id = '{$id}'");

        return ($clienteDuplicado == null and $profesionalDuplicado == null)  ;
    }

    public static function mailNoRepetidoProfesional($email, $id){
        $clienteDuplicado = DB::selectOne("SELECT email FROM cliente WHERE email = '{$email}'");
        $profesionalDuplicado = DB::selectOne("SELECT email FROM profesional WHERE email = '{$email}'
                                                    EXCEPT SELECT email FROM profesional WHERE id = '{$id}'");

        return ($clienteDuplicado == null && $profesionalDuplicado == null);
    }

    public static function mailNoRepetidoProfesionalNuevo($email){
        $clienteDuplicado = DB::selectOne("SELECT email FROM cliente WHERE email = '{$email}'");
        $profesionalDuplicado = DB::selectOne("SELECT email FROM profesional WHERE email = '{$email}'");

        return ($clienteDuplicado == null && $profesionalDuplicado == null);
    }

}
