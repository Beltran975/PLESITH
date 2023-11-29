<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*rutas de vistas*/
Route::get('/', function () {
    return view('index');
});

Route::get('/pru', function () {
    return view('prueba-index');
});

Route::get('/la', function () {
    return view('prueba_layouts');
});

Route::get('/home', function () {
    return view('home');
});


Auth::routes();


Route::get('header', function(){
    return view('layouts/header');
});
Route::get('footer', function(){
    return view('layouts/footer');
});

