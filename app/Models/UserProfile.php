<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';

    protected $fillable = [
    'dob',
    'user_id',
    'title',
    'firstname',
    'lastname',
    'middlename',
    'home_airport',
    'dob',
    'gender',
    'company',
    'department',
    'work_phone',
    'ext',
    'cell_phone',
    'work_fax',
    'home_phone',
    'second_phone',
    'passport_firstname',
    'passport_lastname',
    'passport_MI',
    'passport_no',
    'passport_country_issued',
    'passport_issue_date',
    'passport_exp_date',
    'redress_no',
    'known_traveler_no',
    'seat_location',
    'special_meal',
    'preferred_airport',
    'special_air_request',
    'room_type',
    'bed_type',
    'special_hotel_request',
    'car_size',
    'special_car_request',
    'airline_name',
    'airline_membership',
    'airline_passport',
    'airline_membership_type',
    'when_we_call',
    'when_email_you',
    'preferred_method',
    'hotel_name',
    'hotel_membership',
    'hotel_password',
    'hotel_membership_type',
    'car_name',
    'car_password',
    'car_membership',
    'car_membership_type',
    'notes'
];  

   public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
