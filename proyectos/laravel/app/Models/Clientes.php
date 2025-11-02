<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    /** @use HasFactory<\Database\Factories\ClientesFactory> */
    use HasFactory;

    protected $table = "clientes";

    protected $fillable = [
        "nombre",
        "apellido",
        "edad",
        "id_empresa"
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
