<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Postulaciones;
use App\Models\Producciones;
use App\Models\Nodo;
use App\Models\Infotech;
use App\Models\Bibliotech;
use App\Models\Reserva;

class homeAdminController extends Controller
{
    public function getUser()
    {
        $userCount = User::count();
        $postulacionesCount = Postulaciones::count();
        $produccionesCount = Producciones::count();
        $nodoCount = Nodo::count();
        $infotechCount = Infotech::count();
        $bibliotechCount = Bibliotech::count();
        $reservasCount = Reserva::count();
        $verificadoCount = Postulaciones::where('estatus', 'Aprobado')->count();
        $inhabilitadosCount = User::where('tipo', 'Inhabilitado')->count();
    
        return view('administrador.home-admin', compact(
            'userCount', 'postulacionesCount', 'produccionesCount', 
            'nodoCount', 'infotechCount', 'bibliotechCount', 
            'reservasCount', 'verificadoCount', 'inhabilitadosCount'
        ));
    }
}    
