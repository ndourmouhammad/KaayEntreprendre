<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ressource>
 */
use App\Models\Categorie;
use App\Models\User;

class RessourceFactory extends Factory
{
    protected $model = \App\Models\Ressource::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'contenu' => $this->faker->text,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'categorie_id' => Categorie::factory(),
            'user_id' => User::factory(),
            

        ];
    }
}
