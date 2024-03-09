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
        return view('administrador.home-admin');
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
}
