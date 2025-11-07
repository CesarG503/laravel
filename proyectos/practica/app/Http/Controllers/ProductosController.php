<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::all();

        return view('producto.index', compact('productos'));
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
        $request->validate([],[]);
        
        Productos::create($request->all());

        return redirect()->route('producto.index')->with(['success','Producto Creado Con Exito']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        
        return view('producto.edit',['producto'=> $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productos $producto)
    {
        $request->validate([],[]);

        $producto->update($request->all());

       return redirect()->route('producto.index')->with(['success','Producto Editado Con Exito']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')->with(['success' => 'Producto Borrado correctamente']);
    }
}
