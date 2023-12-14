<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformacion_investigadoresRequest;
use App\Http\Requests\UpdateInformacion_investigadoresRequest;
use App\Models\Informacion_investigadores;

class InformacionInvestigadoresController extends Controller
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
        return Informacion_investigadores::create([
            'linea_investigacion' => $data['linea_investigacion'],
            'grado_academico' => $data['grado_academico'],
            'pertenece_SNI' => $data['pertenece_SNI'],
            'evidencia_SNI' => $data['evidencia_SNI'],
            'evidencia_grado_academico' => $data['evidencia_grado_academico'],
        ]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'linea_investigacion' => ['required', 'string', 'max:255'],
            'grado_academico' => ['required', 'string', 'max:255'],
            'pertenece_SNI' => ['required', 'string'],
            'evidencia_SNI' => ['required', 'string'],
            'evidencia_grado_academico' => ['required', 'string'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInformacion_investigadoresRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Informacion_investigadores $informacion_investigadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informacion_investigadores $informacion_investigadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformacion_investigadoresRequest $request, Informacion_investigadores $informacion_investigadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informacion_investigadores $informacion_investigadores)
    {
        //
    }
}
