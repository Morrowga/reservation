<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'address', 'zip_code', 'city','state', 'email_address', 'phone','check_in', 'check_out',
    'check_in_time', 'check_out_time','adult_count', 'children_count','room_number', 'room_type','instructions'];

    protected $table = 'reservations';
}
