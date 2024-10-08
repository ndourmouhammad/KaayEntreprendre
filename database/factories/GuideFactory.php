<?php

namespace Database\Factories;

use App\Models\Etape;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guide>
 */
class GuideFactory extends Factory
{
    protected $model = \App\Models\Guide::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'contenu' => $this->faker->paragraphs(3, true),
            'user_id' => $this->faker->numberBetween(1, 10),


        ];
    }
}

