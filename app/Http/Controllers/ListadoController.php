<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;

class ListadoController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('administrador.listado', ['info'=>$query]);
    }

    public function buscar(Request $request)
    {
        $titulo = $request->input('titulo');
        $region = $request->input('region');
        $area = $request->input('area');
        $año = $request->input('año');
        $nombre = $request->input('nombre');
        $institucion = $request->input('institucion');
       
        
        $query = Nodo::query();
        if ($titulo) {
            $query->where('tema_inv', 'like', "%$titulo%");
        }
        if ($region) {
            $query->where('categoria', 'like', "%$region%");
        }
        if ($area) {
            $query->where('lider', 'like', "%$area%");
        }
        if ($año) {
            $query->where('colaboradores', 'like', "%$año%");
        }
        if ($nombre) {
            $query->where('linea_inv', 'like', "%$nombre%");
        }
        if ($institucion) {
            $query->where('institucion_ligada', 'like', "%$institucion%");
        }
        $info = $query->paginate(5);

        return view('administrador.listado', compact('info'));
    }
    
}

