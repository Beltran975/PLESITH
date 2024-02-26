<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CorreoverController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\tablaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\dictamenController;
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

Route::get('/nodo', function () {
    return view('nodo');
});

//rutas para actulizar datos de usuario
Route::resource('/home', RegisterController::class);

Route::get('/infotech', function () {
    return view('infotech');
});
Route::get('/bibliotechComunidad', function () {
    return view('bibliotechComunidad');
});

Auth::routes();

Route::get('/home-admin', [App\Http\Controllers\HomeController::class,'getUser'])->name('administrador.home-admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



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


Route::get('/register', [RegisterController::class, 'create'])->name('auth.create');
Route::post('/store', [RegisterController::class, 'store'])->name('auth.store');
Route::get('/showFilesById/{id}/files', [RegisterController::class, 'showFilesById'])->name('auth.showFilesById');

//ruta para registrar Informacion PLESITH
Route::post('EnvioInformacion', [App\Http\Controllers\InformacionController::class,'Insertar']);
//ruta para registrar Informacion Producciones
Route::post('EnvioProduccion', [App\Http\Controllers\ProduccionesController::class,'Insert']);
Route::get('ListaProduccion', [App\Http\Controllers\ListaprodController::class,'list']);

//ruta para ver postulantes 





//ruta para documento de investigación 
Route::get('/documentoInvestigacion', function(){
    return view('administrador.docInvestigacion');
});
//ruta para guardar datos de form docInvestigacion
Route::post('EnvioDocInves', [App\Http\Controllers\docInvestigacionController::class,'Insertar']);
Route::get('/bibliotechComunidad', [App\Http\Controllers\BibliotechController::class, 'index']);





Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);



Route::get('administrador/tabla', [tablaController::class, 'mostrarDatos']);


//Rutas para enviar correos 
Route::get('/enviar-correo', [EmailController::class, 'enviarCorreo'])->name('enviar.correo');

//verificar direccion de correo
Route::get('/verificar-Correo', [CorreoverController::class, 'VerificarCorreo'])->name('enviar.correo');

Route::get('/aprobar-usuario-desde-correo/{userId}', [CorreoverController::class, 'aprobarVerificacionDeCorreo'])->name('aprobarVerificacionDeCorreo');
//verficar usuario 
//rutas para enviar dictamen dictamen de aceptación y negación de postulación 
Route::post('/postulaciones/{id}/aprobar', [DictamenController::class, 'aprobarPostulacion'])->name('postulaciones.aprobar');

Route::post('/postulaciones/{id}/negar', [DictamenController::class, 'negarPostulacion'])->name('postulaciones.negar');
//ruta nodos
Route::post('EnvioNodo', [App\Http\Controllers\NodosController::class, 'Insertar']);
Route::get('NodosComunidad', [App\Http\Controllers\ListaNodosController::class, 'index']);

//rutas gestion
Route::get('/gestion-infotech', function(){
    return view('administrador.gestion-infotech');
});
Route::post('EnvioInfotech', [App\Http\Controllers\InfotechController::class, 'insertar']);

Route::get('/gestion-bibliotech', function(){
    return view('administrador.gestion-bibliotech');
});
Route::post('EnvioBiliotech', [App\Http\Controllers\BibliotechController::class, 'insertar']);
//Route::get('/bibliotech', 'docInvestigacionController@index');
//Route::get('/bibliotech', [App\Http\Controllers\docInvestigacionController::class, 'index']);

