<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecteurActivite>
 */
class SecteurActiviteFactory extends Factory
{
    protected $model = \App\Models\SecteurActivite::class;

    public function definition()
    {
        return [
            'libelle' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}

