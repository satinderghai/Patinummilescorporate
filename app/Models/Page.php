<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Page extends Model
{
	protected $table = 'pages';
  protected $fillable = [
      'id',
      'user_id',
      'title',
      'meta_title',
      'meta_keyword',
      'meta_description',
      'content',
      'slug',
      'status'
      
  ];
}