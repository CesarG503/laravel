<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Inicio(){
        
        return view('incio');
    }
    public function Aceptar(Request $request)
    {
        $datos = $request->all();
        return view('aceptar', ['datos' =>$datos]);
    }
}
