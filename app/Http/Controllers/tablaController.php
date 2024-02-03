<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulaciones;
use App\Models\User;

class tablaController extends Controller
{
    public function mostrarDatos()
    {
        $users = User::with('postulaciones')->get();

        return view('pruebadatos', compact('users'));
    }
}
