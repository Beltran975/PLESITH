<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instituciones;

class InstitucionController extends Controller
{
    public function obtenerInstituciones()
    {
        $instituciones = Instituciones::pluck('nombre')->toArray(); 
        return response()->json($instituciones);
    }
}
