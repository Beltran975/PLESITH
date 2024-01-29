<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListaprodController extends Controller
{
    //
    public function index()
    {
        $query = DB::table('producciones')->get();
        return view('home', ['datos'=>$query]);
    }
}
