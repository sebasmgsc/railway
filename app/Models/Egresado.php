<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'nombre_completo',
        'numero_telefono',
        'correo_electronico',
        'fecha_nacimiento',
        'programa',
        'nombre_empresa',
        'puesto_desempenado',
        'fecha_inicio',
        'fecha_termino',
        'funciones_principales',
    ];
}
