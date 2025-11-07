<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('estudiante',EstudiantesController::class);

Route::resource('productos', ProductosController::class);

Route::resource('materia', MateriasController::class);