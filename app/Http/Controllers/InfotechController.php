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

    public function filter(Request $request)
    {
        $year = $request->input('year');
    $month = $request->input('month'); // Agrega esta línea para obtener el mes seleccionado

    // Verifica si se ha seleccionado un año
    if ($year === 'all') {
        $convocatorias = Infotech::all();
    } else {
        $query = Infotech::query()->whereYear('year', $year);

        // Verifica si se ha seleccionado un mes específico
        if ($month) {
            $query->whereMonth('fecha_de_tu_campo_mes', $month); // Reemplaza 'fecha_de_tu_campo_mes' con el nombre real de tu columna de mes
        }

        $convocatorias = $query->get();
    }

        return view('infotechComunidad', compact('convocatorias', 'year'));
    }

}
