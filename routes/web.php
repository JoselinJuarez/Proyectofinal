<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\objetosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\LoginController;
//Route::get('/', function () {
   // return view('login');
//});

//Route::get('/home', function () {
    //return view('home');
//});
Route::get('/home',[LoginController::class,'home'])->name('home');
Route::get('/clientes', function () {
    return view('clientes');

});
////////cliente controller
//cliente ver
Route::get('/clientes',[ClientesController::class,'indexclient'])->name('clientes');
Route::post('/clientes-insertar',[ClientesController::class,'createclient'])->name('clientes.create');
Route::get('/clientes/edit/{id}',[ClientesController::class,'edit'])->name('clientes.edit');
Route::put('/clientes/update/{id}',[ClientesController::class,'update'])->name('clientes.actualizar');
Route::get('/client', function () {
    return view('client');
 });
////
/////
///
//

//Route::get("/home1", [LoginController::class, 'function'])->name('prestamos');
Route::get("/", [LoginController::class, 'showLoginForm'])->name('login');
Route::post("/login", [LoginController::class, 'function'])->name('login.enviar');
Route::get('/usuarios', function () {
    return view('usuarios');
});
Route::get("/prestamos", [PrestamosController::class, 'index'])->name('prestamos');
//dlete product
Route::get("/prestamos/eliminar-{id}", [PrestamosController::class, 'delete'])->name('prestamos.delete');
//Route::get("/prestamos", [PrestamosController::class, 'index'])->name('prestamos');
//anadir product
Route::post("/prestamos-insertar", [PrestamosController::class, 'create'])->name('prestamos.create');
//Route::post("/prestamos-insertar", [PrestamosController::class, 'create'])->name('prestamos.create');
//Route::get("/prestamos-update", [PrestamosController::class, 'update'])->name('prestamos.update');

//insertar
Route::get('/insertar', function () {
   return view('prestamosinsertar');
});
//

Route::get('/editar/{id}',[PrestamosController::class,'edit'])->name('editar.prestamos');
//Route::get('/editarprestamos', function () {
 ////   return view('editarprestamos');
//});
////garantias

Route::get("/garantias",[objetosController::class,'indexgarantia'])->name('garantias');
//Route::get('/garantias', function () {
 //   return view('garantias');
//});

Route::post('/crearobjeto',[objetosController::class,'crearobjeto'])->name('create.garantia');
Route::get('/ircrearobjeto', function () {
    return view('crearobjeto');
});


Route::get('/pagos', function () {
    return view('pagos');
});
//

