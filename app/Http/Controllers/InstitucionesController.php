<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitucionesRequest;
use App\Http\Requests\UpdateInstitucionesRequest;
use App\Models\Instituciones;

class InstitucionesController extends Controller
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
    public function create()
    {
        $instituciones = Instituciones::all();
        return \view('register', compact('instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitucionesRequest $request)
    {
        //
        Instituciones::create($request->all());
        return 'Completado';
    }

    /**
     * Display the specified resource.
     */
    public function show(Instituciones $instituciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instituciones $instituciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitucionesRequest $request, Instituciones $instituciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituciones $instituciones)
    {
        //
    }
}
