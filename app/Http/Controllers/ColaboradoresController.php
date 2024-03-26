<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //nombre de el modelo que contengs en campo 'email'

class ColaboradoresController extends Controller
{
    public function obtenerCorreos()
    {
        $correos = User::pluck('email')->toArray(); // Obtener todos los correos electrónicos de la base de datos
        return response()->json($correos);
    }
}
