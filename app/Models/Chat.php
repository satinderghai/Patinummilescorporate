<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

	protected $table = 'chat';
  protected $fillable = [
  'id',
  'compnay_id',
  'created_at',
  'updated_at',
  'status',
  'message',
  'user_id'
  ];
  
}
