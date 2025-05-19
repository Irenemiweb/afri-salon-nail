<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageNewService extends Model
{
    use HasFactory;
    protected $table = 'imagenewservices';

    protected $fillable = [
        'servicio_id', 'name', 'path'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
    //opcional se puede poner:
    //protected $guarded = [];
}
