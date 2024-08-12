<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\ReservationCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    // protected static function booted()
    // {
    //     static::updated(function ($reservation) {
    //         if ($reservation->isDirty('status')) {
    //             $reservation->user->notify(new ReservationCreated($reservation, $reservation->status));
    //         }
    //     });
    // }

    
}
