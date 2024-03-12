<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CorreoverController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\tablaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\dictamenController;
use App\Http\Controllers\NodosController;
use App\Http\Controllers\ProduccionesController;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\ListaNodosController;
use App\Http\Controllers\BibliotechController;
use App\Http\Controllers\InfotechController;

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

Route::get('/nodo', function () {
    return view('nodo');
});

//rutas para actulizar datos de usuario
Route::resource('/datos', RegisterController::class);

Route::get('/infotechComunidad', function () {
    return view('infotechComunidad');
});
Route::get('/bibliotechComunidad', function () {
    return view('bibliotechComunidad');
});

Auth::routes();

Route::get('/home-admin', [App\Http\Controllers\HomeController::class,'getUser'])->name('administrador.home-admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

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
Route::get('/tablaBibliotech', function () {
    return view('administrador.bibliotech.index');
});
//ruta para guardar datos de form docInvestigacion
Route::post('EnvioDocInves', [App\Http\Controllers\docInvestigacionController::class,'Insertar']);
Route::get('/bibliotechComunidad', [App\Http\Controllers\BibliotechController::class, 'index']);
Route::resource('/bibliotech', BibliotechController::class);
Route::resource('/add', BibliotechController::class);
Route::get('administrador/bibliotech/tabla', [App\Http\Controllers\BibliotechController::class, 'lista'])->name('listaBibliotech');

Route::get('/generate-pdf', [PdfController::class, 'generatePdf']);

Route::get('administrador/postulaciones/tabla', [tablaController::class, 'mostrarDatos'])->middleware('auth');

//Rutas para enviar correos 
Route::get('/enviar-correo', [EmailController::class, 'enviarCorreo'])->name('enviar.correo');

//verificar direccion de correo
Route::get('/verificar-Correo', [CorreoverController::class, 'VerificarCorreo'])->name('enviar.correo');

Route::get('/aprobar-usuario-desde-correo/{userId}', [CorreoverController::class, 'aprobarVerificacionDeCorreo'])->name('aprobarVerificacionDeCorreo');
//verficar usuario 

//rutas para enviar dictamen dictamen de aceptación y negación de postulación 
Route::get('/administrador/postulaciones/form-aprobar/{PosId}',[tablaController::class,'FormAprobar'])->name('postulaciones.form-aprobar');
Route::post('/administrador/postulaciones/generar-pdf-aprobado/{PosId}', [TablaController::class, 'generarPDFaprobado'])->name('generarPDFaprobado.post');
//postulacion negada
Route::get('/administrador/postulaciones/form-negar/{PosId}',[tablaController::class,'FormNegar'])->name ('postulaciones.form-negar');
Route::post('/administrador/postulaciones/generar-pdf-negado/{PosId}',[TablaController::class, 'generarPDFnegado'])->name('generarPDFnegado.post');


//ruta nodos
Route::post('EnvioNodo', [App\Http\Controllers\NodosController::class, 'Insertar']);
Route::get('/nodo/{id}/edit', [NodosController::class, 'edit'])->name('nodos.edit');;
Route::get('/nodo/{id}/update', [NodosController::class, 'update'])->name('nodos.update');;
Route::put('/nodo/{id}/update', [NodosController::class, 'update'])->name('nodos.update');;
Route::get('NodosComunidad', [App\Http\Controllers\ListaNodosController::class, 'index']);

Route::get('/administrador/gestion-nodos', function () {
    return view('/administrador/gestion-nodos'); 
});

Route::get('/administrador/gestion-producciones', function () {
    return view('/administrador/gestion-producciones'); 
});

//rutas gestion
Route::get('/gestion-infotech', function(){
    return view('administrador.infotech.gestion-infotech');
});
Route::get('/tablaInfotech', function(){
    return view('administrador.infotech.index');
});
Route::post('EnvioInfotech', [App\Http\Controllers\InfotechController::class, 'insertar']);
Route::get('administrador/infotech/tabla', [App\Http\Controllers\InfotechController::class, 'lista'])->name('listaInfotech');
Route::get('/infotech/{id}/edit', [InfotechController::class, 'edit'])->name('infotech.edit');;
Route::get('/infotech/{id}/update', [InfotechController::class, 'update'])->name('infotech.update');;
Route::put('/infotech/{id}/update', [InfotechController::class, 'update'])->name('infotech.update');;
Route::resource('/nuevo', InfotechController::class);

Route::get('/infotechComunidad', [App\Http\Controllers\InfotechController::class, 'indexInfo']);


Route::get('/gestion-bibliotech', function(){
    return view('administrador.bibliotech.gestion-bibliotech');
});
Route::post('EnvioBiliotech', [App\Http\Controllers\BibliotechController::class, 'insertar']);
//Route::get('/bibliotech', 'docInvestigacionController@index');
//Route::get('/bibliotech', [App\Http\Controllers\docInvestigacionController::class, 'index']);
Route::resource('/buscar', NodosController::class);

Route::get('/nodo/listaNodos', function () {
    return view('nodo.listaNodos');
});

Route::get('/nodo/listaNodos', [App\Http\Controllers\ListaNodosController::class, 'lista']);


//rutas producciones
Route::get('/Producciones/produc/listaProducciones', [App\Http\Controllers\ProduccionesController::class, 'lista']);
Route::resource('/editProduc', ProduccionesController::class,);
Route::resource('/home', VistaController::class);

Route::resource('/nodo', ListaNodosController::class);
Route::get('/nodo/listaNodos', [App\Http\Controllers\ListaNodosController::class, 'lista']);

Route::get('/Producciones/listaProducciones', [App\Http\Controllers\ProduccionesController::class, 'lista']);
//Route::resource('/listaProducciones', ProduccionesController::class);
Route::resource('/Producciones/editProduc', ProduccionesController::class,);
Route::resource('/home', VistaController::class)->middleware('auth');

Route::resource('/nodo', ListaNodosController::class);
Route::get('/nodo/listaNodos', [App\Http\Controllers\ListaNodosController::class, 'lista'])->name('listaNodos');