<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    /** @use HasFactory<\Database\Factories\EstudiantesFactory> */
    use HasFactory;
    protected $table = "estudiantes";
    protected $fillable = [
        "nombre",
        "apellido",
        "id_materia",
        "id_notas"
    ];

    public function materia()
    {
        return $this->belongsTo(Materias::class , "id_materia" );
    }
    public function nota()
    {
        return $this->belongsTo(Notas::class , "id_notas");
    }
}
