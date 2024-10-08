<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/clientes', function () {
    return view('clientes');

});
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

