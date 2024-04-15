<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Postulaciones;
use App\Models\Producciones;
use App\Models\Nodo;
use App\Models\Infotech;
use App\Models\Bibliotech;

class homeAdminController extends Controller
{
    public function getUser()
    {
        $userCount = User::count(); // contar el numero de usuarios
        $postulacionesCount = Postulaciones::count(); // contar el numero de postulaciones
        $produccionesCount = Producciones::count(); // contar el numero de producciones
        $nodoCount = Nodo::count(); // contar el numero de nodos
        $infotechCount = Infotech::count(); // contar el numero en infotech
        $bibliotechCount = Bibliotech::count(); // contar el numero en bibliotech
        return view('administrador.home-admin', compact('userCount', 'postulacionesCount', 'produccionesCount', 'nodoCount', 'infotechCount', 'bibliotechCount'));
    }
}
