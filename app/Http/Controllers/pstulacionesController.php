<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class pstulacionesController extends Controller
{
    public function verPostulaciones(){
        $postulantes = User::all();
        return view('administrador.tabla',['postulantes' => $postulantes]);
    }
}
