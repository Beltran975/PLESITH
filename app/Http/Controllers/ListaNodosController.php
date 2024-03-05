<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;

class ListaNodosController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('nodo.nodosComunidad',['datos'=>$query]);
    }

    public function lista()
    {
        $query = DB::table('nodo')->get();
        return view('nodo.listaNodos', ['datos'=>$query]);
    }

    public function destroy($id)
    {
        $query = Nodo::findOrFail($id);
        $query->delete();
        return view('nodo.listaNodos');
        //return redirect()->route('buscar.Insertar');
    }
}
