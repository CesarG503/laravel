<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MainController::class)->group(function (){
   
    Route::get('/inicio','Inicio')->name('inicio');
});

route::resource('empleados', EmpleadosController::class);