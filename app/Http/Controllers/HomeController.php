<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
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
