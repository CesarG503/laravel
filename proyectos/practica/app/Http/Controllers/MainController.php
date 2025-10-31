<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Inicio()
    {
        $productos = Producto::all();
        $loco = 'crazy';

        return view('pages.inicio', compact('productos', 'loco'));

    }
}
