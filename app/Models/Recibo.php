<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    // Especifica la tabla asociada al modelo
    protected $table = 'recibos';
    public $timestamps = false;
    // Especifica las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'numero_recibo',
        'fecha',
        'id_cliente',
        'tipo_impuesto',
        'valor_neto',
        'importe_impuesto',
        'valor_bruto',
        'subtotal',
        'descuento_total',
        'descuento_total_porcentaje',
        'responsable_cobro'
    ];

    // Define la relación con el modelo User
    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }
    // En el modelo Recibo
    public function serviciosVendidos()
    {
        return $this->hasMany(ReciboServicioVendido::class, 'id_recibo');
    }
    // Si deseas que el número de recibo se incremente automáticamente, puedes manejarlo con un método
    public static function boot()
    {
        parent::boot();

        static::creating(function ($recibo) {
            if (!$recibo->numero_recibo) {
                $recibo->numero_recibo = self::max('numero_recibo') + 1;
            }
        });
    }
}
