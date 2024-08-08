<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function secteur_activite()
    {
        return $this->belongsTo(SecteurActivite::class);
    }

    protected function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    protected function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function retour_experiences()
    {
        return $this->hasMany(RetourExperience::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
