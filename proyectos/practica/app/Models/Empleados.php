<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;

    protected $table = "empleados";
    protected $fillable = ['nombre','empresa_id'];

    public function empresa()
    {
     
        return $this->belongsTo(Empresas::class,'empresa_id');
    }
    
}
