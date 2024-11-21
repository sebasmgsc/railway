<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    // Definir el nombre de la tabla si no sigue la convención (en este caso, es 'oferta_laborals')
    protected $table = 'oferta_laborals';

    // Definir los campos que pueden ser asignados de forma masiva
    protected $fillable = [
        'puesto',
        'empresa',
        'ubicacion',
        'salario',
        'requisitos',
        'fecha_publicacion',
        'fecha_limite',
        'descripcion'
    ];

    // Definir los campos que deberían ser tratados como fechas (si tienes campos de fecha)
    protected $dates = [
        'fecha_publicacion',
        'fecha_limite',
        'created_at',
        'updated_at',
    ];

    // Si deseas personalizar el formato de las fechas, puedes hacerlo aquí
    // protected $dateFormat = 'Y-m-d H:i:s';  // ejemplo de un formato personalizado

    // Si necesitas establecer alguna relación en el futuro (por ejemplo, con otros modelos),
    // puedes hacerlo aquí. Por ejemplo, si tienes una relación con usuarios:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
