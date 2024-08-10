<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum')
->apiResource('reservations', ReservationController::class);
Route::apiResource('discussions', DiscussionController::class);
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('discussions/search', [DiscussionController::class, 'recherche'])->name('discussions.search');
Route::prefix('discussions/{discussion}')->group(function () {
    Route::get('commentaire', [CommentaireController::class, 'index']);
    Route::post('commentaire', [CommentaireController::class, 'store']);
    Route::put('commentaire/{id}', [commentaireController::class, 'update']);
    Route::delete('commentaire/{id}', [CommentaireController::class, 'destroy']);

});