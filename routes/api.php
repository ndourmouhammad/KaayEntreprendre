<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('discussions', DiscussionController::class);
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('discussions/search', [DiscussionController::class, 'recherche'])->name('discussions.search');
Route::get('categories', [CategorieController::class,'index'])->name('categorie');
Route::get('etapes', [EtapeController::class,'index'])->name('etapes');
Route::prefix('discussions/{discussion}')->group(function () {
    Route::get('commentaire', [CommentaireController::class, 'index']);
    Route::post('commentaire', [CommentaireController::class, 'store']);
    Route::put('commentaire/{id}', [commentaireController::class, 'update']);
    Route::delete('commentaire/{id}', [CommentaireController::class, 'destroy']);
});