<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Bibliotech;

class BibliotechController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg = new Bibliotech;
            $reg->titulo = $request->get('titulo');
            $reg->year = $request->get('year');
            if ($request->hasFile('documento')) {
                $documento = $request->file('documento');
                $documento->move(public_path().'/bibliotech/',$documento->getClientOriginalName());
                $reg->documento = $documento->getClientOriginalName();
            }
            $reg->descripcion = $request->get('descripcion');
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()->route('listaBibliotech');
    }
    
    public function index(Request $request)
    {
        $buscador=$request->get('buscador');
        $datos = Bibliotech::where('titulo','like','%'.$buscador.'%')->simplePaginate();
         // $query = DB::table('dovInves')->get();
        return view('bibliotechComunidad', compact('datos','buscador'));
        return view('administrador.docInvestigacion', ['datos'=>$query]); 
    }

    public function lista()
    {
        $datos = Bibliotech::all();
        return view('administrador.bibliotech.index', compact('datos'));
    }

    public function edit($id)
    {
        $datos= Bibliotech::findOrFail($id);
        return view('administrador.bibliotech.editBibliotech', compact('datos'));
    }

    public function update(Request $request, $id){
        
        $datos=Bibliotech::findOrFail($id);
        $datos->titulo=$request->input('titulo');
        $datos->year=$request->input('year');
        // $datos->documento=$request->input('documento');
        $datos->descripcion=$request->input('descripcion');

        $datos->save();
        return redirect()->route('listaBibliotech');
    }

    public function destroy($id)
    {
        $datos = Bibliotech::findOrFail($id);
        $datos->delete();
        return redirect()->route('listaBibliotech');
    }

    public function create()
    {
        return view('administrador.bibliotech.create');
    }
}
