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
    return view('prueba-layouts');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/nodos', function () {
    return view('nodos');
});
Route::get('/edit-perfil', function () {
    return view('auth/edit-perfil');
});



Auth::routes();


Route::get('header', function(){
    return view('layouts/header');
});
Route::get('headers', function(){
    return view('layouts/header-nav');
});
Route::get('footer', function(){
    return view('layouts/footer');
});

// En routes/web.php

Route::get('edit-perfil/{id}', 'Auth\RegisterController@edit')->name('edit-perfil');
Route::put('update/{id}', 'Auth\RegisterController@update')->name('update');

