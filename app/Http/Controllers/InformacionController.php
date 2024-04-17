<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Informacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    //
    public function Insertar(Request $request)
    {
        try {
            DB::beginTransaction();

            // Crear un nuevo registro de Informacion
            $reg = new Informacion;
            $reg->lineaInv = $request->get('lineaInv');
            $reg->grado = $request->get('grado');
            $reg->id_user = Auth::id();

            $grado = $request->get('grado');
            $nivelUsuario = ($grado === 'Maestría' || $grado === 'Doctorado') ? 'Nivel 2' : 'Nivel 1';

            $reg->nivel = $nivelUsuario;

            // Guardar la evidencia de grado académico si existe
            if ($request->hasFile('evidenciaGrado')) {
                $academico = $request->file('evidenciaGrado');
                $academico->move(public_path() . '/documentos-users/info-PLESITH/academico/', $academico->getClientOriginalName());
                $reg->evidenciaGrado = $academico->getClientOriginalName();
            }

            // Guardar la evidencia del SNI y manejar el campo 'pertenece'
            $perteneceSNI = $request->get('pertenece');
            $reg->pertenece = $perteneceSNI; // Asignamos el valor del radio button directamente
            if ($perteneceSNI === 'si') {
                $reg->nivel = 'Nivel 3';
                if ($request->hasFile('evidenciaSni')) {
                    $evidencia = $request->file('evidenciaSni');
                    $evidencia->move(public_path() . '/documentos-users/info-PLESITH/evidencia/', $evidencia->getClientOriginalName());
                    $reg->evidenciaSni = $evidencia->getClientOriginalName();
                }
            } else {
                // Si no pertenece al SNI, asegúrate de no intentar guardar evidencia del SNI
                $reg->save();
                DB::commit();
                return redirect()->route('home.index');
            }

            // Guardar el registro de Informacion y finalizar la transacción
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // Maneja cualquier error aquí
        }

        return redirect()->route('home.index');
    }



    public function edit($id)
    {
        $dato = Informacion::findOrFail($id);
        return view('auth.editInfoPLESITH', compact('dato'));
    }

    public function update(Request $request, $id)
    {
        $dato = Informacion::findOrFail($id);
        if ($request->has('lineaInv')) {
            $dato->lineaInv = $request->input('lineaInv');

            
        }
        //$dato->lineaInv = $request->input('lineaInv');
        $dato->grado = $request->input('grado');
        $grado = $request->input('grado');
        $nivelUsuario = ($grado === 'Maestría' || $grado === 'Doctorado') ? 'Nivel 2' : 'Nivel 1';
        $dato->nivel = $nivelUsuario;

        $dato->pertenece = $request->input('pertenece');
        if ($request->hasFile('evidenciaSni')) {
            $evidencia = $request->file('evidenciaSni');
            $evidencia->move(public_path() . '/documentos-users/info-PLESITH/evidencia/', $evidencia->getClientOriginalName());
            $dato->evidenciaSni = $evidencia->getClientOriginalName();
            $dato->nivel = "Nivel 3";

        }

        $dato->save();

        return redirect()->route('home.index');
    }
}
