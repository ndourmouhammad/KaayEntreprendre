<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\SecteurActivite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'photo' => $this->faker->imageUrl(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'statut' => true,
            'cv' => null,
            'remember_token' => Str::random(10),
            'secteur_activite_id' => SecteurActivite::factory(), // Assigne un secteur d'activité aléatoire
        ];
    }
}
