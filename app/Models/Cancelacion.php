<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancelacion extends Model
{
    use HasFactory;
    // Nombre de la tabla (opcional si es 'cancelaciones')
    protected $table = 'cancelacions';
    public $timestamps = false;
    // Definir los campos que son asignables en masa
    protected $fillable = [
        'reserva_id',
        'motivo_cancelacion',
        'cancelado_por',
        'id_user',
        'fecha_cancelacion',
        'tipo_usuario',
    ];

    // Relación con el modelo Reserva (uno a muchos inverso)
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id'); // Relación inversa
    }
}
