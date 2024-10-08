<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

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

    public function secteur_activite()
    {
        return $this->belongsTo(SecteurActivite::class, 'secteur_activite_id');
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    public function commentaires()
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

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public function sentAccompanimentRequests()
{
    return $this->hasMany(AccompagnementPersonnalise::class, 'sender_id');
}

public function receivedAccompanimentRequests()
{
    return $this->hasMany(AccompagnementPersonnalise::class, 'receiver_id');
}

// User.php
public function getPhotoUrlAttribute()
{
    return $this->photo ? asset('storage/photos/' . str_replace('public/', '', $this->photo)) : null;
}

public function getCvUrlAttribute()
{
    return $this->cv ? asset('storage/cv/' . str_replace('public/', '', $this->cv)) : null;
}


}
