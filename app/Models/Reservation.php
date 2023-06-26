<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'reservation_datetime',
        'number_of_people',
        'message',
        'status',
    ];
}
