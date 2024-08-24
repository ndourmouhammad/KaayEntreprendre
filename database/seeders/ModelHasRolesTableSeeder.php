<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $coachRole = Role::firstOrCreate(['name' => 'coach']);
        $entrepreneurRole = Role::firstOrCreate(['name' => 'entrepreneur']);

        // Récupérer les utilisateurs spécifiques par ID
        $adminUser = User::find(1); // Exemple : ID 1 pour l'admin
        $entrepreneurUser = User::find(3); // Exemple : ID 3 pour l'entrepreneur

        // Assigner les rôles aux utilisateurs spécifiques
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }

        if ($entrepreneurUser) {
            $entrepreneurUser->assignRole($entrepreneurRole);
        }

        // Assigner le rôle de coach à cinq utilisateurs aléatoires
        $coaches = User::inRandomOrder()->take(5)->get();

        foreach ($coaches as $coachUser) {
            $coachUser->assignRole($coachRole);
        }
    }
}
