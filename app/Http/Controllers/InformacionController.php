<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Informacion;


use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    //
    public function Insertar(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg=new Informacion;
            
            $reg->lineaInv = $request->get('lineaInv');
            $reg->grado = $request->get('grado');
            $reg->id_user = Auth::id();
            if ($request->hasFile('evidenciaGrado')) {
                $academico=$request->file('evidenciaGrado');
                $academico->move(public_path().'/academico/',$academico->getClientOriginalName());
                $reg->evidenciaGrado=$academico->getClientOriginalName();
            }
            $reg->pertenece = $request->get('pertenece');
            if ($request->hasFile('evidenciaSni')) {
                $evidencia=$request->file('evidenciaSni');
                $evidencia->move(public_path().'/evidencia/',$evidencia->getClientOriginalName());
                $reg->evidenciaSni=$evidencia->getClientOriginalName();
            }
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return view('home');
    }
}
