<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //nombre de el modelo que contengs en campo 'email'
use App\Mail\CorreoColaborador;
use Illuminate\Support\Facades\Mail;
use App\Models\Nodo;

class ColaboradoresController extends Controller
{
    public function obtenerCorreos()
    {
        $correos = User::pluck('email')->toArray(); // Obtener todos los correos electrónicos de la base de datos
        return response()->json($correos);
    }

    public function enviarCorreo(Request $request)
{
    $correoColaborador = $request->input('correo');

    // Verifica si el correo del colaborador es válido antes de enviar
    if ($correoColaborador) {
        $correo = new CorreoColaborador($correoColaborador);
        Mail::to($correoColaborador)->send($correo);
    }

    return redirect()->route('home.index');
}
}
