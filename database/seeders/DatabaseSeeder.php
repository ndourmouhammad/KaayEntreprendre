<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
            UserSeeder::class,
            CategorieSeeder::class,
            RessourceSeeder::class,
            DiscussionSeeder::class,
            GuideSeeder::class,
            EvenementSeeder::class,
            CommentaireSeeder::class,
            EtapeSeeder::class,
            // NotificationSeeder::class,
            ReservationSeeder::class,
            RetourExperienceSeeder::class,
            SecteurActiviteSeeder::class, //
            RolesAndPermissionsSeeder::class
        ]);
    }

}
