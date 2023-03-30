<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

	protected $table = 'messages';
  protected $fillable = [
  'id',
  'chat_id',
  'user_id',
  'created_at',
  'updated_at',
  'status',
  'message',
  'is_read',
  'type'
  ];
  
}
