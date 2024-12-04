<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ClientesController;
use App\Http\Controllers\User\GarantiasController;
use App\Http\Controllers\User\PagosController;
use App\Http\Controllers\User\PrestamosController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'verificarLogin']);

Route::middleware('Administrador')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('adminDashboard');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}/delete', [UserController::class, 'destroy'])->name('users.delete');
});

Route::middleware('Cobrador')->group(function () {
    Route::get('/cobrador/dashboard', [UserController::class, 'showDashboard'])->name('userDashboard');

    Route::get('/cobrador/clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/cobrador/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/cobrador/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/cobrador/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/cobrador/clientes/{cliente}/update', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/cobrador/clientes/{cliente}/delete', [ClientesController::class, 'destroy'])->name('clientes.delete');

    Route::get('/cobrador/prestamos', [PrestamosController::class, 'index'])->name('prestamos.index');
    Route::get('/cobrador/prestamos/create', [PrestamosController::class, 'create'])->name('prestamos.create');
    Route::post('/cobrador/prestamos/store', [PrestamosController::class, 'store'])->name('prestamos.store');
    Route::get('/cobrador/prestamos/{prestamo}/edit', [PrestamosController::class, 'edit'])->name('prestamos.edit');
    Route::put('/cobrador/prestamos/{prestamo}/update', [PrestamosController::class, 'update'])->name('prestamos.update');
    Route::delete('/cobrador/prestamos/{prestamo}/delete', [PrestamosController::class, 'destroy'])->name('prestamos.delete');
    Route::get('/cobrador/prestamos/pdf', [PrestamosController::class, 'pdf'])->name('prestamos.pdf');

    Route::get('/cobrador/pagos', [PagosController::class, 'index'])->name('pagos.index');
    Route::get('/cobrador/pagos/create', [PagosController::class, 'create'])->name('pagos.create');
    Route::post('/cobrador/pagos/store', [PagosController::class, 'store'])->name('pagos.store');
    Route::get('/cobrador/pagos/{pago}/edit', [PagosController::class, 'edit'])->name('pagos.edit');
    Route::put('/cobrador/pagos/{pago}/update', [PagosController::class, 'update'])->name('pagos.update');
    Route::delete('/cobrador/pagos/{pago}/delete', [PagosController::class, 'destroy'])->name('pagos.delete');

    Route::get('/cobrador/garantias', [GarantiasController::class, 'index'])->name('garantias.index');
    Route::get('/cobrador/garantias/create', [GarantiasController::class, 'create'])->name('garantias.create');
    Route::post('/cobrador/garantias/store', [GarantiasController::class, 'store'])->name('garantias.store');
    Route::get('/cobrador/garantias/{garantia}/edit', [GarantiasController::class, 'edit'])->name('garantias.edit');
    Route::put('/cobrador/garantias/{garantia}/update', [GarantiasController::class, 'update'])->name('garantias.update');
    Route::delete('/cobrador/garantias/{garantia}/delete', [GarantiasController::class, 'destroy'])->name('garantias.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
