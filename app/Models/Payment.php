<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
     // Nombre de la tabla en la base de datos
     protected $table = 'payments';

     // Definir los campos que se pueden asignar de manera masiva (Mass Assignment)
     protected $fillable = [
         'reserva_id',
         'total',
         'metodo_pago',
         'fecha'
     ];

     // Relación con la tabla de Reservas (Una reserva puede tener muchos pagos)
     public function reserva()
     {
         return $this->belongsTo(Reservation::class, 'reserva_id', 'id');
     }
}
