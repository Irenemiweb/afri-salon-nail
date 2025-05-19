<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;
     // Especificar la tabla si no es la pluralización predeterminada
     protected $table = 'descuentos';

     // Definir los campos que son asignables en masa
     protected $fillable = [
         'porcentaje',
         'id_user',
         'importe_descuento',
     ];

     // Definir los valores por defecto
     protected $attributes = [
         'porcentaje' => 'Sin descuento',
         'importe_descuento' => 0,
     ];

     // Relación con el modelo User (un descuento pertenece a un usuario)
     public function user()
     {
         return $this->belongsTo(User::class, 'id_user');
     }
}
