<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use PHPUnit\Metadata\Group;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MainController::class)->group(function ()
{

    Route::get('/inicio', 'Inicio')->name('inicio');
    Route::post('/aceptar','Aceptar')->name('aceptar');

});