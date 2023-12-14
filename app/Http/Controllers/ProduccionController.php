<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduccionRequest;
use App\Http\Requests\UpdateProduccionRequest;
use App\Models\Produccion;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(array $data)
    {
        return Produccion::create([
            'tipo' => $data['tipo'],
            'evidencia' => $data['evidencia'],
            'autor_es' => $data['autor_es'],
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'pais' => $data['pais'],
            'year' => $data['year'],
            'proposito' => $data['proposito'],
        ]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'tipo' => ['required', 'string', 'max:255'],
            'evidencia' => ['required', 'string'],
            'autor_es' => ['required', 'string', 'max:255'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string'],
            'year' => ['required', 'string'],
            'proposito' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduccionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produccion $produccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduccionRequest $request, Produccion $produccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produccion $produccion)
    {
        //
    }
}
