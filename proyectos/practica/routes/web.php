<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('empleados', EmpleadosController::class);