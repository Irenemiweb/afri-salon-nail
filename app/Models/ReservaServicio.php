<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla, en caso de que no sea plural de forma automática
    protected $table = 'reservas_servicios';

    // Definir los campos que se pueden asignar masivamente (mass assignable)
    protected $fillable = [
        'total_payment','nota_interna', 'message_for_client'
    ];

    // Relación con la tabla Servicios
    // public function servicio()
    // {
    //     return $this->belongsTo(Servicio::class, 'id_servicio');
    // }

    // Relación con la tabla Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'multiple');  // 'multiple' es la clave foránea en 'reservas'
    }

    // Relación con la tabla Empleadas
    // public function empleada()
    // {
    //     return $this->belongsTo(Empleada::class, 'id_empleado');
    // }
}
