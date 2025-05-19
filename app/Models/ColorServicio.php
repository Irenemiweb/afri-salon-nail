<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorServicio extends Model
{
    use HasFactory;

    protected $table = 'colorServicios';

    protected $fillable = [
        'color'
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;
}
