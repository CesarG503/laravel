<?php

use App\Http\Controllers\Courses_Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses', Courses_Controller::class);