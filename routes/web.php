<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/categorias', App\Http\Controllers\CategoriaController::class);
    Route::resource('/productos', App\Http\Controllers\ProductoController::class);
    Route::resource('/pedidos', App\Http\Controllers\PedidoController::class);
    Route::resource('/metodosDePago', App\Http\Controllers\MetodoDePagoController::class);    
    Route::resource('/calificaciones', App\Http\Controllers\CalificacionController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
