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
        return redirect()->route('home.index');

    }
    
    public function index(Request $request)
    {
        $tema_inv = $request->get('buscar');
        
        $datos = Nodo::where('linea_inv', 'like', "%$tema_inv%")
            ->paginate(5);
            
            return view('nodo.nodosComunidad', compact('datos'));
    }
    
    public function edit($id){
        $datos=Nodo::findOrFail($id);
        return view('nodo.editMinodo', compact('datos'));
    }
    
    public function update(Request $request, $id){
        
        $dato=Nodo::findOrFail($id);
        $dato->tema_inv=$request->input('tema_inv');
        if ($request->has('categoria')) {
            $dato->categoria = $request->input('categoria');}
        $dato->lider=$request->input('lider');
        $dato->colaboradores=$request->input('colaboradores');
        if ($request->has('linea_inv')) {
            $dato->linea_inv = $request->input('linea_inv');}
        if ($request->has('institucion_ligada')) {
            $dato->institucion_ligada = $request->input('institucion_ligada');}
        $dato->descripcion=$request->input('descripcion');
        // $dato->documento=$request->input('documento');

        $request->validate([
            'tema_inv' => 'required',
            'lider' => 'required',
            'colaboradores' => 'required',
            'descripcion' => 'required',
            ],[
                'tema_inv.required' => 'El campo no puede estar vacio',
                'lider.required' => 'El campo no puede estar vacio',
                'colaboradores.required' => 'El campo no puede estar vacio',
                'descripcion.required' => 'El campo no puede estar vacio',
            ]);

        $dato->save();
        return redirect()->route('listaNodos');
    }
}
