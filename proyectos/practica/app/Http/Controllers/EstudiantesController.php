<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\Materias;
use App\Models\Notas;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiantes::query();

        $materias = Materias::all();

        if(isset($request->busqueda))
            {
                $estudiantes->where($request->opcion , 'like', "%{$request->busqueda}%");
            }
        
        $estudiantes = $estudiantes->get();
        
        return view('index', compact('estudiantes', 'materias'));
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
         $nombre_regex = '/^[A-Za-z\s]+$/';
         $telefono_regex = '/^\d{4}-\d{4}$/';
         $dui_regex = '/^\d{8}-\d{1}$/';
         
        $request->validate(
            [
                "nombre" => ['required','string', 'regex: /^[A-Za-z\s]+$/'],
                "apellido" => ['required', 'string'],
                "id_materia" => ['required','exists:materias,id'],
                'nota' => ['required','numeric']

            ],
            [ 'nombre.regex'=>'Ingresas letras en el nombre'

            ]);

        $nota = Notas::create(["notas"=> $request->nota,'id_materia' => $request->id_materia]);

        Estudiantes::create([
        "nombre" => $request->nombre,
        "apellido" => $request->apellido,
        "id_materia" => $request->id_materia,
        "id_notas" => $nota->id
        ]);

        return redirect()->route('estudiante.index')->with(['success' => 'Se creo correctamente el usuario']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
