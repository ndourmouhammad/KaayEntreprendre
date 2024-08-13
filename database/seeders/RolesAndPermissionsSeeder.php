<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Réinitialiser le cache des rôles et permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        

        // Créer des permissions pour admin
        Permission::create(['name' => 'activer_user']);
        Permission::create(['name' => 'desactiver_user']);
        Permission::create(['name' => 'lister_users']);
        Permission::create(['name' => 'supprimer_user']);
        Permission::create(['name' => 'changer_role']);
        Permission::create(['name' => 'lister_roles']);
        Permission::create(['name' => 'ajouter_role']);
        Permission::create(['name' => 'supprimer_role']);
        Permission::create(['name' => 'modifier_role']);
        Permission::create(['name' => 'lister_permissions']);
        Permission::create(['name' => 'ajouter_permission']);
        Permission::create(['name' => 'supprimer_permission']);
        Permission::create(['name' => 'modifier_permission']);
        Permission::create(['name' => 'ajouter_evenement']);
        Permission::create(['name' => 'modifier_evenement']);
        Permission::create(['name' => 'supprimer_evenement']);
        Permission::create(['name' => 'lister_evenements_supprimés']);
        Permission::create(['name' => 'restaurer_evenement_supprimé']);
        Permission::create(['name' => 'supprimer_evenement_supprimé']);
        Permission::create(['name' => 'supprimer_discussion']);
        Permission::create(['name' => 'supprimer_commentaire']);
        Permission::create(['name' => 'ajouter_retour_experience']);
        Permission::create(['name' => 'modifier_retour_experience']);
        Permission::create(['name' => 'supprimer_retour_experience']);
        Permission::create(['name' => 'ajouter_guide']);
        Permission::create(['name' => 'modifier_guide']);
        Permission::create(['name' => 'supprimer_guide']);
        Permission::create(['name' => 'lister_resersations']);
        Permission::create(['name' => 'confirmer_reservation']);
        Permission::create(['name' => 'refuser_reservation']);
        Permission::create(['name' => 'lister_retours_experiences_supprimés']);
        Permission::create(['name' => 'restaurer_retour_experience_supprimé']);
        Permission::create(['name' => 'supprimer_retour_experience_supprimé']);
        Permission::create(['name' => 'lister_guides_supprimés']);
        Permission::create(['name' => 'restaurer_guide_supprimé']);
        Permission::create(['name' => 'supprimer_guide_supprimé']);
        Permission::create(['name' => 'ajouter_etape']);
        

        // Créer des permissions pour coach
        Permission::create(['name' => 'ajouter_ressource']);
        Permission::create(['name' => 'modifier_ressource']);
        Permission::create(['name' => 'supprimer_ressource']);
        Permission::create(['name' => 'lister_ressources_supprimées']);
        Permission::create(['name' => 'restaurer_ressource_supprimée']);
        Permission::create(['name' => 'supprimer_ressource_supprimée']);
        
        
        // Créer le rôle "admin" et leur assigner des permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'activer_user',
            'desactiver_user',
            'supprimer_user',
            'ajouter_evenement',
            'modifier_evenement',
            'supprimer_evenement',
            'supprimer_discussion',
            'supprimer_commentaire',
            'ajouter_retour_experience',
            'modifier_retour_experience',
            'supprimer_retour_experience',
            'ajouter_guide',
            'modifier_guide',
            'supprimer_guide',
            'lister_users',
            'supprimer_user',
            'changer_role',
            'lister_roles',
            'ajouter_role',
            'supprimer_role',
            'modifier_role',
            'lister_permissions',
            'ajouter_permission',
            'supprimer_permission',
            'modifier_permission',
            'lister_resersations',
            'confirmer_reservation',
            'refuser_reservation',
            'lister_evenements_supprimés',
            'restaurer_evenement_supprimé',
            'supprimer_evenement_supprimé',
            'lister_retours_experiences_supprimés',
            'restaurer_retour_experience_supprimé',
            'supprimer_retour_experience_supprimé',
            'lister_guides_supprimés',
            'restaurer_guide_supprimé',
            'supprimer_guide_supprimé',
            'ajouter_etape',

            
        ]);

        // Créer le rôle "coach" et leur assigner des permissions
        $coachRole = Role::create(['name' => 'coach']);
        $coachRole->givePermissionTo([
            'ajouter_ressource',
            'modifier_ressource',
            'supprimer_ressource',
            'lister_ressources_supprimées',
            'restaurer_ressource_supprimée',
            'supprimer_ressource_supprimée',
            
        ]);

        // Créer le rôle "entrepreneur" et leur assigner des permissions
        $entrepreneurRole = Role::create(['name' => 'entrepreneur']);

    }
}
