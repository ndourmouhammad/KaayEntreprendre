<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    public function run()
    {
        Discussion::factory()->count(5)->create();
    }
}

