<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleada extends Model
{
    use HasFactory;

    protected $table = 'empleadas';

    protected $fillable = [
        'nombre', 'especialidad', 'img_empleada', 'telefono', 'primerApellido'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'empleada_id');
    }
    public function ventas()
    {
        return $this->hasMany(ReciboServicioVendido::class, 'empleado_id');
    }
}
