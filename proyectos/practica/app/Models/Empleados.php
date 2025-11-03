<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresas;
class Empleados extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadosFactory> */
    use HasFactory;
    protected $table = 'empleados';
    protected $fillable = 
    [
        'nombre',
        'edad',
        'dui',
        'paiz',
        'numero',
        'id_empresa'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresas::class,'id_empresa');
    }
}
