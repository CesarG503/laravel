<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    /** @use HasFactory<\Database\Factories\NotasFactory> */
    use HasFactory;

    protected $table = "notas";
    protected $fillable = [
        "notas",
        "id_materia"
    ];

    public function materia() {

        return $this->belongsTo(Materias::class, "id_materia");
    }
}
