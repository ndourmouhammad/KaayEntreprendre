<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    protected $model = \App\Models\Discussion::class;

    public function definition()
    {
        return [
            'libelle' => $this->faker->sentence,
            'contenu' => $this->faker->paragraphs(3, true),
        ];
    }
}
