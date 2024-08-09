<?php

namespace Database\Factories;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvenementFactory extends Factory
{
    protected $model = Evenement::class;

    public function definition()
    {
        return [
            'theme' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'lieu' => $this->faker->address(),
            'nombre_places' => $this->faker->numberBetween(10, 100),
            'date_debut' => $this->faker->dateTime(),
            'date_fin' => $this->faker->dateTime(),
            'prix' => $this->faker->numberBetween(1000, 10000),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
