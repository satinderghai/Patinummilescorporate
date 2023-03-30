<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $table = 'company';
  protected $fillable = [
  'id',
  'user_id',
  'code',
  'company_name',
  'image',
  'status'
  ];
  
}
