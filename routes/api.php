<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SecteurActiviteController;
use App\Http\Controllers\RetourExperienceController;
use App\Http\Controllers\AccompagnementPersonnaliseController;

// public
Route::apiResource('discussions', DiscussionController::class)->except('update', 'store','destroy');
Route::apiResource('retour-experience', RetourExperienceController::class)->only('index', 'show');
Route::apiResource('evenements', EvenementController::class)->only('index', 'show');
Route::get('/ressources',[RessourceController::class, 'index']);
Route::get('/ressources/{id}', [RessourceController::class, 'show']);
Route::get('/guides', [GuideController::class, 'index']);
Route::get('/guides/{id}', [GuideController::class, 'show']);
Route::get('categories', [CategorieController::class,'index'])->name('categorie');
Route::get('categories/{id}', [CategorieController::class,'show'])->name('etapes.show');
Route::get('/etapes', [EtapeController::class,'index'])->name('etapes.index');
route::apiResource('/secteurActivite',SecteurActiviteController::class)->only('index','');

// Authentification
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->post('/refresh', [AuthController::class, 'refreshToken']);
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth')->post('/update/{id}', [AuthController::class, 'update'])->middleware('auth:api');
Route::get('nombre_entrepreneur', [AuthController::class, 'nombreEntrepreneurs'])->name('nombre_entrpreneur');
Route::get('nombre_coach', [AuthController::class, 'nombreCoaches'])->name('nombre_coach');
Route::get('user_connecte', [AuthController::class, 'informations'])->name('user_connecte');


//Liste des coaches pour demmande d'accompagnement personnalisé
Route::get('/coaches-accompagnement', [AccompagnementPersonnaliseController::class, 'getCoaches']);
//afficher la liste des secteur d'activité
// Route::get('/secteurs', [SecteurActiviteController::class, 'index']);
//afficher la liste des coaches par secteur
Route::get('/coaches/secteur/{id}', [AuthController::class, 'getCoachesBySecteur']);
//afficher les détail du coach
Route::get('/coach/{id}', [AuthController::class, 'show']);

Route::get('nombre_evenements', [EvenementController::class, 'nombreEvenements'])->name('nombre_evenements');
Route::get('nombre_evenements_a_venir', [EvenementController::class, 'nombreEvenementsAvenir'])->name('nombre_evenements_avenir');

Route::get('ressources_categories/{id}', [RessourceController::class, 'indexByCategory']);




Route::middleware(["auth"])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->middleware('permission:lister_users');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->middleware('permission:supprimer_user');
    Route::post('/users/{id}/role', [AdminController::class, 'changeRole'])->middleware('permission:changer_role');
    Route::post('/users/{id}/activate', [AdminController::class, 'activate'])->middleware('permission:activer_user');
    Route::post('/users/{id}/deactivate', [AdminController::class, 'deactivate'])->middleware('permission:desactiver_user');
    Route::get('/users/{id}', [AdminController::class, 'show'])->middleware('permission:lister_users');

    // Route::get('/profil', [AdminController::class,'show']);
    Route::put('/profil/{id}', [AdminController::class, 'updateProfile']);
   
    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:lister_roles');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('permission:ajouter_role');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->middleware('permission:modifier_role');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->middleware('permission:supprimer_role');
    Route::post('/roles/{id}/permission', [RoleController::class, 'givePermissions'])->middleware('permission:ajouter_permission');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->middleware('permission:lister_permissions');
    Route::post('/permissions', [PermissionController::class, 'store'])->middleware('permission:ajouter_permission');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->middleware('permission:modifier_permission');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->middleware('permission:supprimer_permission');

    // Ajouter une discussion
    Route::post('discussions/{id}', [DiscussionController::class, 'update']);
    Route::post('discussions', [DiscussionController::class, 'store']);
    Route::delete('discussions/{id}', [DiscussionController::class, 'destroy']);

    // Commentaires
    Route::prefix('discussions/{discussion}')->group(function () {
        // Route::get('commentaires', [CommentaireController::class, 'index']);
        Route::post('commentaire', [CommentaireController::class, 'store']);
        Route::post('commentaire/{id}', [commentaireController::class, 'update']);
        Route::delete('commentaire/{id}', [CommentaireController::class, 'destroy']);
    });
});


Route::post('reservations/{id}/confirmer', [ReservationController::class, 'confirmerReservation']);
Route::post('reservations/{id}/refuser', [ReservationController::class, 'refuserReservation']);

Route::middleware(["auth"])->group(function () {
    Route::post('evenements', [EvenementController::class, 'store'])->middleware('permission:ajouter_evenement');
    Route::post('evenements/{id}', [EvenementController::class, 'update'])->middleware('permission:modifier_evenement');
    Route::delete('evenements/{id}', [EvenementController::class, 'destroy'])->middleware('permission:supprimer_evenement');
    // réserver un evenement
    Route::post('evenements/{id}/reservation', [ReservationController::class, 'reserver']);

    // voir mes reservations
    Route::get('mes-reservations', [ReservationController::class, 'mesReservations']);

    // voir les reservations d'un evenement
    Route::get('evenements/{id}/reservations', [ReservationController::class, 'reservationsEvenement'])->middleware('permission:lister_resersations');

    // confirmer réservation (bientot ajout des permissions)
    // Route::post('reservations/{id}/confirmer', [ReservationController::class, 'confirmerReservation'])->middleware('permission:confirmer_reservation');

    // refuser une reservation (bientot ajout des permissions)
    // Route::post('reservations/{id}/refuser', [ReservationController::class, 'refuserReservation'])->middleware('permission:refuser_reservation');

    // Route pour afficher la liste des événements supprimés (soft deleted)
    Route::get('trashed-evenements', [EvenementController::class, 'trash'])->name('evenements.trashed')->middleware('permission:lister_evenements_supprimés');

    // Route pour restaurer un événement supprimé (soft deleted)
    Route::patch('evenements/{id}/restore', [EvenementController::class, 'restore'])->name('evenements.restore')->middleware('permission:restaurer_evenement_supprimé');

    // Route pour supprimer définitivement un événement (force delete)
    Route::delete('evenements/{id}/force-delete', [EvenementController::class, 'forceDelete'])->name('evenements.force-delete')->middleware('permission:supprimer_evenement_supprimé');

});

Route::middleware(["auth"])->group(function () {
   Route::post('retour-experience', [RetourExperienceController::class, 'store'])->middleware('permission:ajouter_retour_experience');
   Route::post('retour-experience/{id}', [RetourExperienceController::class, 'update'])->middleware('permission:modifier_retour_experience');
   Route::delete('retour-experience/{id}', [RetourExperienceController::class, 'destroy'])->middleware('permission:supprimer_retour_experience');

    // Route pour afficher la liste des retours experiences supprimés (soft deleted)
    Route::get('retour_experiences/trashed', [RetourExperienceController::class, 'trash'])->name('retour_experiences.trash')->middleware('permission:lister_retours_experiences_supprimés');

    // Route pour restaurer un retour d'experience supprimé (soft deleted)
    Route::patch('retour_experiences/{id}/restore', [RetourExperienceController::class, 'restore'])->name('retour_experiences.restore')->middleware('permission:restaurer_retour_experience_supprimé');

    // Route pour supprimer définitivement un retour d'experience (force delete)
    Route::delete('retour_experiences/{id}/force-delete', [RetourExperienceController::class, 'forceDelete'])->name('retour_experiences.force-delete')->middleware('permission:supprimer_retour_experience_supprimé');

});



Route::middleware('auth')->group(function () {
    Route::post('/ressources', [RessourceController::class, 'store'])->middleware('permission:ajouter_ressource');
    Route::post('/ressources/{id}', [RessourceController::class, 'update'])->middleware('permission:modifier_ressource');
    Route::delete('/ressources/{id}', [RessourceController::class, 'destroy'])->middleware('permission:supprimer_ressource');
    Route::get('/ressourceCategorie/{id}', [RessourceController::class, 'getRessourcesByCategorie']);
    // Routes pour Sofdelete Ressource
    Route::get('trashed-ressources', [RessourceController::class, "trashed"])->middleware('permission:lister_ressources_supprimées');
    Route::delete('ressources/{id}/force-delete', [RessourceController::class, "forceDelete"])->middleware('permission:supprimer_ressource_supprimée');
    Route::post('ressources/{id}/restore', [RessourceController::class, "restore"])->middleware('permission:restaurer_ressource_supprimée');

});


Route::middleware("auth")->group(function () {
    Route::post('/guides', [GuideController::class, 'store'])->middleware('permission:ajouter_guide');
    Route::post('/guides/{id}', [GuideController::class, 'update'])->middleware('permission:modifier_guide');
    Route::delete('/guides/{id}', [GuideController::class, 'destroy'])->middleware('permission:supprimer_guide');

    // Routes pour afficher les guides supprimés
    Route::get('/trashed-guides', [GuideController::class, 'trashed'])->middleware('permission:lister_guides_supprimés');
    Route::post('/restore-guides/{id}', [GuideController::class, 'restore'])->middleware('permission:restaurer_guide_supprimé');
    Route::post('/force-delete-guides/{id}', [GuideController::class, 'forceDelete'])->middleware('permission:supprimer_guide_supprimé');
    Route::post('/etapes', [EtapeController::class, 'store'])->middleware('permission:ajouter_etape');

// Demande Accompagnement
Route::post('accompagnement/{receiverId}', [AccompagnementPersonnaliseController::class, 'demanderAccompagnementPersonnalise']);
});

// routes/api.php
Route::get('discussions/{id}/commentaires', [DiscussionController::class, 'comments']);





