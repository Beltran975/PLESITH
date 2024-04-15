<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Producciones;
use App\Models\Nodo;
use App\Models\Infotech;
use App\Models\Bibliotech;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=>'getUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUser()
    {
        $userCount = User::count(); // contar el numero de usuarios
        $postulacionesCount = Postulaciones::count(); // contar el numero de postulaciones
        $produccionesCount = Producciones::count(); // contar el numero de producciones
        $nodoCount = Nodo::count(); // contar el numero de nodos
        $infotechCount = Infotech::count(); // contar el numero en infotech
        $verificadoCount = Postulaciones::where('estatus', 'Aprobado')->count();
        $inhabilitadosCount = User::where('tipo', 'Inhabilitado')->count();
        $bibliotechCount = Bibliotech::count(); // contar el numero en bibliotech



        return view('administrador.home-admin', compact('userCount', 'postulacionesCount', 'produccionesCount', 'nodoCount', 'infotechCount', 'bibliotechCount','verificadoCount', 'inhabilitadosCount'));
        return view('administrador.home-admin');
    }
    
    public function index()
    {
        $user = Auth::user();

    // Obtener las postulaciones del usuario autenticado
    $postulaciones = $user->postulaciones;

        return view('home', ['postulaciones' => $postulaciones]);
    }

}
