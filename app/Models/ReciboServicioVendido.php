<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReciboServicioVendido extends Model
{
    use HasFactory;

    // Especifica la tabla asociada al modelo
    protected $table = 'recibos_servicios_vendidos';

    // Especifica las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'id_servicio',
        'id_recibo',
        'descuento_porcentaje',
        'descuento_importe',
        'empleado_id',
    ];

    // Define la relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    // Define la relación con el modelo Recibo
    public function recibo()
    {
        return $this->belongsTo(Recibo::class, 'id_recibo');
    }

    // Define la relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    // Si deseas manejar el cálculo del descuento, puedes agregar un accesor (getter)
    public function getDescuentoTotalAttribute()
    {
        return $this->descuento_importe + ($this->descuento_porcentaje / 100 * $this->servicio->precio);
    }
}
