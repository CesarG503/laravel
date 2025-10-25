<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', [MainController::class,'inicio']);

Route::controller(MainController::class)->group(function()
{
    Route::get('/info','info')->name('info');

});