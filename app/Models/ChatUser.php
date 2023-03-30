<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{

	protected $table = 'chat_users';
  protected $fillable = [
  'id',
  'user_id',
  'message',
  'status',
  'created_at',
  'updated_at'
  ];
  
}
