<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_request extends Model
{
    protected $fillable = ['id','from_user_id', 'to_user_id', 'status', 'delete_chat_from', 'delete_chat_to'];
}
