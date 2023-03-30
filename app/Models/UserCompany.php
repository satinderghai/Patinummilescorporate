<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{

	protected $table = 'user_company';
  protected $fillable = [
  'id',
  'user_id',
  'company_id',
  'status'
  
  ];
  
}
