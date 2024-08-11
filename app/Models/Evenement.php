<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evenement extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
