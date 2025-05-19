<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntelacionTiempoReserva extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla (si no sigue la convención plural)
    protected $table = 'antelacion_tiempo_reserva';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'tiempo',
    ];

    // Si no usas los campos created_at y updated_at, puedes desactivar las marcas de tiempo:
    public $timestamps = true;
}
