<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailPostulacion;
use App\Models\User;

class EmailController extends Controller
{
    public function enviarCorreo()
    {
       $usuarios = User::all();

       foreach ($usuarios as $usuario){

        $correo = new emailPostulacion();
        Mail::to($usuario->email)->send($correo);
       }
       return view ('index');

    }
}
