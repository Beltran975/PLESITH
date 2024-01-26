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

Route::get('/infotech', function () {
    return view('infotech');
});
Route::get('/bibliotech', function () {
    return view('bibliotech');
});

Route::get('administrador/postulaciones', function () {
    return view('administrador/postulaciones');
});

Route::get('/administrador/formaprovacion', function () {
    return view('/administrador/formaprovacion');
});

Route::get('/administrador/formnegacion', function () {
    return view('/administrador/formnegacion');
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

<<<<<<< HEAD
=======
Route::get('edit-perfil/{id}', 'Auth\RegisterController@edit')->name('edit-perfil');
Route::put('update/{id}', 'Auth\RegisterController@update')->name('update');

Route::post('/home/create', 'App\\Http\\Controllers\\ProduccionController@create')->name('produccion.create');

//ruta para registrar Informacion PLESITH
Route::post('EnvioInformacion', [App\Http\Controllers\InformacionController::class,'Insertar']);
//ruta para registrar Informacion Producciones
<<<<<<< Updated upstream
Route::post('EnvioProduccion', [App\Http\Controllers\ProduccionesController::class,'Insert']);
=======
Route::post('EnvioProduccion', [App\Http\Controllers\ProduccionesController::class,'Insert']);
>>>>>>> 0cd4144cd04a523d2bde5683ef461413541383f0
>>>>>>> Stashed changes
