<?php

namespace App\Http\Controllers;

use App\Models\Producciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        // Fetch all productions
        $producciones = Producciones::all();
        return view('catalogo', compact('producciones'));
    }

    public function buscarProducciones(Request $request)
    {
        $tipo = $request->input('tipo');
        $autores = $request->input('autores');
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $pais = $request->input('pais');
        $year = $request->input('year');
        $proposito = $request->input('proposito');
    
        $producciones = Producciones::query();
    
        // Agregar condiciones de búsqueda solo si el valor no está vacío
        if (!empty($tipo)) {
            $producciones->where('tipo', 'LIKE', "%$tipo%");
        }
    
        if (!empty($autores)) {
            $producciones->where('autores', 'LIKE', "%$autores%");
        }
    
        if (!empty($titulo)) {
            $producciones->where('titulo', 'LIKE', "%$titulo%");
        }
    
        if (!empty($descripcion)) {
            $producciones->where('descripcion', 'LIKE', "%$descripcion%");
        }
    
        if (!empty($pais)) {
            $producciones->where('pais', 'LIKE', "%$pais%");
        }
    
        if (!empty($year)) {
            $producciones->where('year', 'LIKE', "%$year%");
        }
    
        if (!empty($proposito)) {
            $producciones->where('proposito', 'LIKE', "%$proposito%");
        }
    
        // Obtener las producciones filtradas
        $producciones = $producciones->get(); // Cambié aquí de `all()` a `get()`
    
        return view('catalogo', compact('producciones'));
    }
    

}
