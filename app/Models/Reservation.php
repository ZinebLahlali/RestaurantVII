<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = [
        'dateReservation',
        'nombrePersonnes',
        'user_id',
        'restaurant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }


}
