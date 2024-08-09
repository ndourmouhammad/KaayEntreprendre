<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    protected $model = \App\Models\Categorie::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];
    }
}

