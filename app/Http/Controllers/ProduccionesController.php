<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Producciones;
use Illuminate\Support\Facades\Auth;

class ProduccionesController extends Controller
{
    //
    public function Insert(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg = new Producciones;
            $reg->tipo = $request->get('tipo');
            $reg->id_user = Auth::id();
            if ($request->hasFile('evidencia')) {
                $produccion=$request->file('evidencia');
                $produccion->move(public_path().'/produccion/',$produccion->getClientOriginalName());
                $reg->evidencia=$produccion->getClientOriginalName();
            }
            $reg->autores = $request->get('autores');
            $reg->titulo = $request->get('titulo');
            $reg->descripcion = $request->get('descripcion');
            $reg->pais = $request->get('pais');
            $reg->year = $request->get('year');
            $reg->proposito = $request->get('proposito');
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return view('home');
    } 


    public function lista()
{
    $producciones = Producciones::where('id_user', Auth::id())->get();
    return view('listaproducciones', compact('producciones'));
}

    public function index()
{
  $Producciones= Producciones::all();
  return view('home', compact('Producciones'));
}

public function edit($id_pro)
{
    $produccion = Producciones::findOrFail($id_pro);
    return view('editproduc', compact('produccion'));
}

public function update(Request $request, $id_pro)
{
    $produccion = Producciones::findOrFail($id_pro);
    $produccion->tipo = $request->input('tipo');
    $produccion->autores = $request->input('autores');
    $produccion->titulo = $request->input('titulo');
    $produccion->descripcion = $request->input('descripcion');
    $produccion->pais = $request->input('pais');
    $produccion->year = $request->input('year');
    $produccion->proposito = $request->input('proposito');
    $produccion->save();
    return redirect()->route('home.index');
}


}
