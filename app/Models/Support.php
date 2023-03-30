<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{

	protected $table = 'chats';
  protected $fillable = [
  '_id',
  '_uid',
  'created_at',
  'updated_at',
  'status',
  'message',
  'type',
  'from_users__id',
  'to_users__id',
  'request_is',
  'users__id',
  'msg_status',
  'is_read'
  ];
  
}
