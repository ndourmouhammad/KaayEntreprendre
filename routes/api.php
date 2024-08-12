<?php


use App\Http\Controllers\RessourceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\RetourExperienceController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EtapeController;




// Authentification
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/refresh', [AuthController::class, 'refreshToken']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
Route::post('/user/update', [AuthController::class, 'update'])->middleware('auth:api');

// Admin


Route::middleware(["auth"])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->middleware('permission:lister_users');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->middleware('permission:supprimer_user');
    Route::post('/users/{id}/role', [AdminController::class, 'changeRole'])->middleware('permission:changer_role');
    Route::post('/users/{id}/activate', [AdminController::class, 'activate'])->middleware('permission:activer_user');
    Route::post('/users/{id}/deactivate', [AdminController::class, 'deactivate'])->middleware('permission:desactiver_user');

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


});





Route::apiResource('discussions', DiscussionController::class)->except('update');
Route::post('discussions/{id}', [DiscussionController::class, 'update']);

// Route::apiResource('reservations', ReservationController::class);
// Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
// Route::get('discussions/search', [DiscussionController::class, 'recherche'])->name('discussions.search');

Route::prefix('discussions/{discussion}')->group(function () {
    Route::get('commentaires', [CommentaireController::class, 'index']);
    Route::post('commentaire', [CommentaireController::class, 'store']);
    Route::post('commentaire/{id}', [commentaireController::class, 'update']);
    Route::delete('commentaire/{id}', [CommentaireController::class, 'destroy']);
});


Route::apiResource('retour-experience', RetourExperienceController::class)->only('index', 'show');

Route::apiResource('evenements', EvenementController::class)->only('index', 'show');


Route::middleware(["auth"])->group(function () {
    Route::post('evenements', [EvenementController::class, 'store'])->middleware('permission:ajouter_evenement');
    Route::post('evenements/{id}', [EvenementController::class, 'update'])->middleware('permission:modifier_evenement');
    Route::delete('evenements/{id}', [EvenementController::class, 'destroy'])->middleware('permission:supprimer_evenement');
    // réserver un evenement
    Route::post('evenements/{id}/reservation', [ReservationController::class, 'reserver']);

    // voir mes reservations
    Route::get('mes-reservations', [ReservationController::class, 'mesReservations']);

    // voir les reservations d'un evenement
    Route::get('evenements/{id}/reservations', [ReservationController::class, 'reservationsEvenement'])->middleware('permission:lister_reservations');

    // confirmer réservation (bientot ajout des permissions)
    Route::post('reservations/{id}/confirmer', [ReservationController::class, 'confirmerReservation'])->middleware('permission:confirmer_reservation');

    // refuser une reservation (bientot ajout des permissions)
    Route::post('reservations/{id}/refuser', [ReservationController::class, 'refuserReservation'])->middleware('permission:refuser_reservation');
});

Route::middleware(["auth"])->group(function () {
   Route::post('retour-experience', [RetourExperienceController::class, 'store'])->middleware('permission:ajouter_retour_experience');
   Route::post('retour-experience/{id}', [RetourExperienceController::class, 'update'])->middleware('permission:modifier_retour_experience');
   Route::delete('retour-experience/{id}', [RetourExperienceController::class, 'destroy'])->middleware('permission:supprimer_retour_experience');
});




Route::get('/ressources',[RessourceController::class, 'index']);
Route::get('/ressources/{id}', [RessourceController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::post('/ressources', [RessourceController::class, 'store'])->middleware('permission:ajouter_ressource');
    Route::post('/ressources/{id}', [RessourceController::class, 'update'])->middleware('permission:modifier_ressource');
    Route::delete('/ressources/{id}', [RessourceController::class, 'destroy']);
    
    // Routes pour Sofdelete Ressource
    Route::get('trashed-ressources', [RessourceController::class, "trashed"]);
    Route::delete('ressources/{id}/force-delete', [RessourceController::class, "forceDelete"])->middleware("auth");
    Route::post('ressources/{id}/restore', [RessourceController::class, "restore"])->middleware("auth");
});



//Route pour afficher tout les Guides
Route::get('/guides', [GuideController::class, 'index']);
//Route pour Show,Update et delete
Route::get('/guides/{id}', [GuideController::class, 'show']);




Route::middleware("auth")->group(function () {
    Route::post('/guides', [GuideController::class, 'store'])->middleware('permission:ajouter_guide');
    Route::post('/guides/{id}', [GuideController::class, 'update'])->middleware('permission:modifier_guide');
    Route::delete('/guides/{id}', [GuideController::class, 'destroy'])->middleware('permission:supprimer_guide');
});



Route::get('categories', [CategorieController::class,'index'])->name('categorie');

Route::get('/etapes', [EtapeController::class,'index'])->name('etapes.index');
Route::post('/etapes', [EtapeController::class, 'store']);
