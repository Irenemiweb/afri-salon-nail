<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoAdicionalCliente extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'infoAdicionalClientes';

    // Si no usas timestamps (created_at, updated_at), establece esta propiedad a false
    public $timestamps = false;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_cliente',
        'numeroCitas',
        'numeroInasistencias',
        'numeroCancelaciones',
        'ultimaVisita',
        'totalIngresos',
        'descuento',
        'clienteConfianza',
    ];

    // Definir la relación con el modelo User (suponiendo que la tabla users tiene un campo id como clave primaria)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente', 'id');
    }

    // Relación con el modelo Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'user_id', 'id_cliente');
    }

}
