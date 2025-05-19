<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryImageNewService extends Model
{
    use HasFactory;
    protected $table = 'temporaryimagenewservices';

    protected $fillable = [
        'folder', 'file', 'id_user'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
