<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListaNodosController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('nodosComunidad',['datos'=>$query]);
    }
}
