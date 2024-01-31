<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListaprodController extends Controller
{
    //
    public function list()
    {
        $query = DB::table('producciones')->get();
        return view('layouts.listaProducciones', ['datos'=>$query]);
    }
}
