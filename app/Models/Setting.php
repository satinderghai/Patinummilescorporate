<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
	protected $table = 'setting';
  protected $fillable = [
      'id',
      'user_id',
      'order_id',
      'director_id',
      'order_limt'
     
      
  ];
}