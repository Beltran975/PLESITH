<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Infotech;

class InfotechController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg = new Infotech;
            $reg->titulo = $request->get('titulo');
            $reg->year = $request->get('year');
            if ($request->hasFile('documento')) {
                $documento = $request->file('documento');
                $documento->move(public_path().'/infotech/', $documento->getClientOriginalName());
                $reg->documento = $documento->getClientOriginalName();
            }
            $reg->descripcion = $request->get('descripcion');
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->route('listaInfotech');
    }


    public function lista()
    {
        $datos = Infotech::all();
        return view('administrador.infotech.index', compact('datos'));
    }

    public function create()
    {
        return view('administrador.infotech.create');
    }

    //datos generales (sin filtros)
    public function indexInfo()
    {
        $convocatorias = Infotech::all();
        return view('infotechComunidad', compact('convocatorias'));
    }

    public function edit($id)
    {
        $datos=Infotech::findOrFail($id);
        return view('administrador.infotech.editInfotech', compact('datos'));
    }
    public function update(Request $request, $id){
        
        $datos=Infotech::findOrFail($id);
        $datos->titulo=$request->input('titulo');
        $datos->year=$request->input('year');
        // $datos->documento=$request->input('documento');
        $datos->descripcion=$request->input('descripcion');

        $datos->save();
        return redirect()->route('listaInfotech');
    }

    public function destroy($id)
    {
        $datos = Infotech::findOrFail($id);
        $datos->delete();
        return redirect()->route('listaInfotech');
    }

    public function filtroBuscar(Request $request)
    {
        $mes = $request->input('mes');
        $year = $request->input('year');

        $query = Infotech::query();

        if ($mes) {
            $query->whereMonth('year', '=', $mes);
        }

        if ($year && $year != 'all') {
            $query->whereYear('year', '=', $year);
        }

        $convocatorias = $query->get();

        return view('infotechComunidad', compact('convocatorias'));
    }

}
