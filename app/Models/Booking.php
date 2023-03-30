<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

	protected $table = 'booking_listing';
  protected $fillable = [
  'id',
  'user_id',
  'location',
  'director_id',
  'off_id',
  'pass_id',
  'order_id',
  'total_currency',
  'booking_reference',
  'cabin_class_name',
  'checkin',
  'checkout',
  'departing_at',
  'arriving_at',
  'travel_name',
  'single',
  'doubles',
  'flight_name',
  'flight_code',
  'rental_car',
  'image',
  'address',
  'created_at',
  'updated_at',
  'status'
 
  ];
  
}
