<?php

namespace Database\Seeders;

use App\Models\RetourExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetourExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RetourExperience::factory()->count(5)->create();
    }
}
