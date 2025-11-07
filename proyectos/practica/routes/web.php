<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('producto', ProductosController::class);