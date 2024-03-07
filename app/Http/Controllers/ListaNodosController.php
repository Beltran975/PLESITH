<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;
use Illuminate\Support\Facades\Auth;

class ListaNodosController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('nodo.nodosComunidad',['datos'=>$query]);
    }

    public function lista()
    {
        $query = Nodo::where('id_user', Auth::id())->get();
        return view('nodo.listaNodos', ['datos'=>$query]);
    }

    public function destroy($id)
    {
        $query = Nodo::findOrFail($id);
        $query->delete();
        return redirect()->route('home.index');
    }
}
