<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageTop extends Model
{

protected $table = 'top_image';
  protected $fillable = [
  'id',
  'user_id',
  'image',
  'status'
  ];
  
}
