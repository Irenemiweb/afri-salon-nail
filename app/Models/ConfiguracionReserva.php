<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionReserva extends Model
{
    protected $table = 'configuracion_reservas';

    // Los campos que son asignables (mass assignable)
    protected $fillable = [
        'confirmacion_automatica',
        'limite_tiempo_reserva',
        'antelacion_reserva',
        'cambio_fecha_reserva',
    ];

    // Si deseas deshabilitar los timestamps (created_at, updated_at), puedes hacerlo
    public $timestamps = true; // Si no tienes campos de tiempo, usa false.
}
