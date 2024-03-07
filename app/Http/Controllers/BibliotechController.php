<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Bibliotech;

class BibliotechController extends Controller
{
    public function insertar(Request $request)
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
        return view('administrador.home-admin');
    }
    
    public function index()
    {
        $datos = Bibliotech::all();
        // $query = DB::table('dovInves')->get();
        return view('bibliotechComunidad', compact('datos'));
        return view('administrador.docInvestigacion', ['datos'=>$query]);
    }

    public function lista()
    {
        $datos = Bibliotech::all();
        return view('administrador.bibliotech.index', compact('datos'));
    }
}
