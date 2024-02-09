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

Auth::routes();

Route::get('/home-admin', [App\Http\Controllers\HomeController::class,'getUser'])->name('administrador.home-admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home-Admin', function () {
    return view('administrador.home-admin');
});

Route::get('/gestionDatos', function () {
    return view('gestionDatos');
});

Route::get('administrador/postulaciones', function () {
    return view('administrador/postulaciones');
});
Route::get('administrador/prueba-postulaciones', function () {
    return view('administrador/prueba-postulaciones');
});
Route::get('/administrador/formaprovacion', function () {
    return view('/administrador/formaprovacion');
});

Route::get('/administrador/formnegacion', function () {
    return view('/administrador/formnegacion');
});

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
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'create'])->name('auth.create');
Route::post('/store', [RegisterController::class, 'store'])->name('auth.store');
Route::get('/showFilesById/{id}/files', [RegisterController::class, 'showFilesById'])->name('auth.showFilesById');

//ruta para registrar Informacion PLESITH
Route::post('EnvioInformacion', [App\Http\Controllers\InformacionController::class,'Insertar']);
//ruta para registrar Informacion Producciones
Route::post('EnvioProduccion', [App\Http\Controllers\ProduccionesController::class,'Insert']);
Route::get('ListaProduccion', [App\Http\Controllers\ListaprodController::class,'list']);

//ruta para ver postulantes 


Route::get('/administrador/tabla', [App\Http\Controllers\pstulacionesController::class, 'verPostulaciones']);



//ruta para documento de investigación 
Route::get('/documentoInvestigacion', function(){
    return view('administrador.docInvestigacion');
});
//ruta para guardar datos de form docInvestigacion
Route::post('EnvioDocInves', [App\Http\Controllers\docInvestigacionController::class,'Insertar']);
Route::get('ListaDocInvestigacion', [App\Http\Controllers\docInvestigacionController::class, 'index']);


use App\Http\Controllers\PdfController;

Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);

use App\Http\Controllers\tablaController;

Route::get('administrador/prueba-postulaciones', [tablaController::class, 'mostrarDatos']);