<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inasistencia extends Model
{
    // Definir la tabla asociada (si no sigue la convención de pluralización)
    protected $table = 'inasistencias';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'id_user',
        'id_reserva',
        'fecha',
    ];

    // Establecer la clave primaria (por defecto es 'id')
    protected $primaryKey = 'id';

    // Indicar si la clave primaria es un número incremental
    public $incrementing = true;

    // Tipo de la clave primaria (BIGINT para id_user y INTEGER para id_reserva)
    protected $keyType = 'int';

    // Para evitar que Laravel intente gestionar las marcas de tiempo (created_at, updated_at)
    public $timestamps = false;

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relación con el modelo Reserva
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
