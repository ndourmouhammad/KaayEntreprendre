<?php

namespace Database\Factories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
use App\Models\User;
use App\Models\Discussion;

namespace Database\Factories;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenu' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'discussion_id' => Discussion::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
