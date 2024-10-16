<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;
Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/clientes', function () {
    return view('clientes');

});

Route::get('/clientes/nuevo', function () {
    return view('formularios/clientesform');

});

Route::post('/clientes/guardar', [clientesController::class, 'guardarCliente']);


Route::get('/usuarios', function () {
    return view('usuarios');
});
Route::get('/prestamos', function () {
    return view('prestamos');
});
Route::get('/garantias', function () {
    return view('garantias');
});
Route::get('/pagos', function () {
    return view('pagos');
});

