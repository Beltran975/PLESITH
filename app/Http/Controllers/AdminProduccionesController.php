<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producciones;
use DB;

class AdminProduccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{

    $tipo = $request->input('tipo');
    $autores = $request->input('autores');
    $titulo = $request->input('titulo');
    $descripcion = $request->input('descripcion');
    $pais = $request->input('pais');
    $year = $request->input('year');
    $proposito = $request->input('proposito');

    $producciones = Producciones::where('tipo', 'like', "%$tipo%")
        ->where('autores', 'like', "%$autores%")
        ->where('titulo', 'like', "%$titulo%")
        ->where('descripcion', 'like', "%$descripcion%")
        ->where('pais', 'like', "%$pais%")
        ->where('year', 'like', "%$year%")
        ->where('proposito', 'like', "%$proposito%")
        ->paginate(5);

    return view('administrador.gestion-producciones', compact('producciones'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    

    public function lista()
    {
      $producciones = DB::table('produccion')->get();
      return view('administrador.gestion-producciones', ['producciones'=>$producciones]);
    }

}
