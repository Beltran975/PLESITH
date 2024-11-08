<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Producciones;
use Illuminate\Support\Facades\Auth;

class ProduccionesController extends Controller
{
    //
    public function Insert(Request $request)
{
    try {
        DB::beginTransaction();

        // Guardar en Producciones
        $reg = new Producciones;
        $reg->tipo = $request->get('tipo');
        $reg->id_user = Auth::id();
        if ($request->hasFile('evidencia')) {
            $produccion = $request->file('evidencia');
            $produccion->move(public_path().'/documentos-users/produccion/', $produccion->getClientOriginalName());
            $reg->evidencia = $produccion->getClientOriginalName();
        }
        $reg->autores = $request->get('autores');
        $reg->titulo = $request->get('titulo');
        $reg->descripcion = $request->get('descripcion');
        $reg->pais = $request->get('pais');
        $reg->year = $request->get('year');
        $reg->proposito = $request->get('proposito');
        $reg->save();



        // Si el tipo es 'Libros o capítulos de libro', guardar en la tabla libros
        if ($request->get('tipo') === 'Libros o capítulos de libro') {
            DB::table('libros')->insert([
                'produccion_id' => $reg->id_pro,
                'editorial' => $request->get('editorial'),
                'edicion' => $request->get('edicion'),
                'estado' => $request->get('estado_libro'),
                'paginas' => $request->get('paginas_libro'),
                'isbn' => $request->get('isbn'), // Asegúrate de que se obtenga el campo ISBN

            ]);
        } elseif ($request->get('tipo') === 'Articulos arbitrados y articulos indexados') {
            // Guardar en la tabla articulos
            DB::table('articulos')->insert([
                'produccion_id' => $reg->id_pro, // Usar el id correcto del registro creado
                'revista' => $request->get('revista'),
                'volumen' => $request->get('volumen'),
                'paginas' => $request->get('paginas'),
                'issn' => $request->get('issn'),
                'descripcion' => $request->get('descripcion'),
                'direccion_articulo' => $request->get('direccion_articulo'),
                'estado' => $request->get('estado_articulo'),
            ]);
        }// Si el tipo es 'Consultoría', guardar en la tabla consultorias
        elseif ($request->get('tipo') === 'Consultoria') {
        DB::table('consultorias')->insert([
            'produccion_id' => $reg->id_pro, // Relacionar con la producción
            'alcance_objetivo' => $request->get('alcance_objetivo'),
            'empresa_beneficiaria' => $request->get('empresa_beneficiaria'),
            'estado' => $request->get('estado'),
        ]);
    }

        DB::commit();
    } catch (Exception $e) {
        DB::rollback();
    }
    return redirect()->route('home.index');
}



    public function lista()
{
    $producciones = Producciones::where('id_user', Auth::id())->get();
    return view('Producciones.listaproducciones', compact('producciones'));
}

    public function index()
{
  $Producciones= Producciones::all();
  return view('home', compact('Producciones'));
}

public function edit($id_pro)
{
    $produccion = Producciones::findOrFail($id_pro);
    return view('Producciones.editproduc', compact('produccion'));
}

public function update(Request $request, $id_pro)
{
    $produccion = Producciones::findOrFail($id_pro);
    if ($request->has('tipo')) {
        $produccion->tipo = $request->input('tipo');
    }
    //$produccion->tipo = $request->input('tipo');
    $produccion->autores = $request->input('autores');
    $produccion->titulo = $request->input('titulo');
    $produccion->descripcion = $request->input('descripcion');
    $produccion->pais = $request->input('pais');
    $produccion->year = $request->input('year');
    if ($request->has('proposito')) {
        $produccion->proposito = $request->input('proposito');
    }
    //$produccion->proposito = $request->input('proposito');
    $produccion->save();
    return redirect()->route('listaProducciones');
}

public function destroy($id_pro)
    { 
        
    $produccion = Producciones::findOrFail($id_pro);
    $produccion->delete();
    return redirect()->route('listaProducciones');
    }

}
