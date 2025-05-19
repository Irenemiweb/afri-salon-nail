<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriageneral extends Model
{
    use HasFactory;
    // Especificar el nombre exacto de la tabla
    protected $table = 'categoriasgenerales';

    // Si no usas timestamps (created_at, updated_at), desactívalos
    public $timestamps = false;

    // Opcional: define los campos que se pueden asignar masivamente
    protected $fillable = ['nombre'];
}
