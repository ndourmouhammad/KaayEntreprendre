<?php

namespace Database\Seeders;

use App\Models\SecteurActivite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecteurActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SecteurActivite::factory()->count(5)->create();
    }
}
