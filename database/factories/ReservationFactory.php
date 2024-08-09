<?php

namespace Database\Factories;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = \App\Models\Reservation::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['en_attente', 'accepte', 'refuse']),
            'user_id' => User::factory(),
            'evenement_id' => Evenement::factory(),
        ];
    }
}
