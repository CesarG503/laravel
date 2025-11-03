<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Empresas;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $empresas = Empresas::all(); 
        $clientes = Clientes::all();

        return view('inicio',compact('empresas','clientes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

        "nombre"=> 'required',
        "apellido" => 'required',
        "edad"=> 'required',
        "id_empresa" => 'required'
        ]);

        Clientes::create($request->all());

        return redirect()->route('clientes.index')->with(['success'=> 'Cliente Creado con exito']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        $empresas = Empresas::all(); 
        $clientes = Clientes::all();

        return view('inicio',['empresas' => $empresas,'clientes' =>$clientes, 'cliente'=>$cliente]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $cliente)
    {
        $request->validate(
[
            "nombre"=> 'required',
            "apellido" => 'required',
            "edad"=> 'required',
            "id_empresa" => 'required'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with(['success'=>'Cliente Actualizado correctamente']);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with(['success'=>'Borrado Correctamente']);
    }
}
