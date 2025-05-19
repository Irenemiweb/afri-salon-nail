<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaServicio;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
//activo quiere decir que no está eliminado
    protected $fillable = [
        'nombre', 'descripcion', 'categoria', 'precio', 'borderColor', 'horaNewService', 'minutosNewService', 'tipoPrecioNewService', 'duracion', 'activo', 'categoria_servicio_id'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
    // En el modelo Servicio
public function recibosVendidos()
{
    return $this->hasMany(ReciboServicioVendido::class, 'id_servicio');
}
 public function categoria()
    {
        return $this->belongsTo(CategoriaServicio::class);
    }
}
