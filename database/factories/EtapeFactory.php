<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etape>
 */
use App\Models\Guide;

class EtapeFactory extends Factory
{
    protected $model = \App\Models\Etape::class;

    public function definition()
    {
        return [
            'libelle' => $this->faker->sentence,
            'pieces_jointes' => $this->faker->filePath(),
            'guide_id' => Guide::factory(),
        ];
    }
}
