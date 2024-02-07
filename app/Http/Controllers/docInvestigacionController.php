<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\docInvestigacion;

class docInvestigacionController extends Controller
{
    public function Insertar(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg = new docInvestigacion;
            $reg->titulo = $request->get('titulo');
            $reg->year = $request->get('year');
            if ($request->hasFile('documento')) {
                $docInves = $request->file('documento');
                $docInves->move(public_path().'/docInvestigacion/',$docInves->getClientOriginalName());
                $reg->documento = $docInves->getClientOriginalName();
            }
        $reg->descripcion = $request->get('descripcion');
        $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return view('administrador.docInvestigacion');
    }

    public function index()
    {
        $query = DB::table('dovInves')->get();
        return view('administrador.docInvestigacion', ['datos'=>$query]);
    }
}
