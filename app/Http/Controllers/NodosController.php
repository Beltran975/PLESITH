<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;
use Illuminate\Support\Facades\Auth;

class NodosController extends Controller
{
    public function Insertar(Request $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $reg = new Nodo;
            $reg->tema_inv = $request->get('tema_inv');
            $reg->categoria = $request->get('categoria');
            $reg->id_user = Auth::id();
            $reg->lider = $request->get('lider');
            $reg->colaboradores = $request->get('colaboradores');
            $reg->linea_inv = $request->get('linea_inv');
            $reg->institucion_ligada = $request->get('institucion_ligada');
            $reg->descripcion = $request->get('descripcion');
            if ($request->hasFile('documento')) {
                $documento = $request->file('documento');
                $documento->move(public_path().'/nodos/',$documento->getClientOriginalName());
                $reg->documento = $documento->getClientOriginalName();
            }
            $reg->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return view('home');

    }
    
    public function index(Request $request)
    {
        $tema_inv = $request->get('buscar');
        
        $datos = Nodo::where('linea_inv', 'like', "%$tema_inv%")
            ->paginate(5);
            
            return view('nodo.nodosComunidad', compact('datos'));
    }

}
