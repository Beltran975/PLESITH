<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListadoController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('administrador.listado', ['info'=>$query]);
    }
}
