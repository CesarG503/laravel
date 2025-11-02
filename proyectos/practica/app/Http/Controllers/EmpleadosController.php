<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Empresas;
use App\View\Components\alert;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $empleados = Empleados::all();
        $empresas = Empresas::all();

        return view('index', ["empleados"=> $empleados, "empresas" => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'empresa_id' => 'required|exists:empresas,id',
            ]);
        //$request->validate(['nombre' => 'required', 'empresa_id' => 'required']);
        Empleados::create(['nombre' => $request->nombre, 'empresa_id' => $request->empresa_id]);
        
        echo 'hola';
        return redirect()->route('empleados.index')
                     ->with('success', 'Empleado creado correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleado)
    {
        $empleados = Empleados::all();
        $empresas = Empresas::all();

        return view('index', ["empleados"=> $empleados, "empresas" => $empresas, "empleado"=> $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleado)
    {
        $request->validate(['nombre'=>'required', 'empresa_id'=> 'required']);

        $empleado->update([
            'nombre'=> $request->nombre,
            'empresa_id' => $request->empresa_id
        ]);

        return redirect()->route('empleados.index')->with(['success' => 'actualizado correctamente']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Empleados::destroy($id);
        return redirect()->route('empleados.index')->with(["success"=> 'Se borro corectamente']);
    }
}
