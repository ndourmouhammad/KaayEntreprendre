

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReservationController;



Route::apiResource('reservations', ReservationController::class);
Route::apiResource('discussions', DiscussionController::class);
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('discussions/search', [DiscussionController::class, 'recherche'])->name('discussions.search');
Route::prefix('discussions/{discussion}')->group(function () {
    Route::get('commentaire', [CommentaireController::class, 'index']);
    Route::post('commentaire', [CommentaireController::class, 'store']);
    Route::put('commentaire/{id}', [commentaireController::class, 'update']);
    Route::delete('commentaire/{id}', [CommentaireController::class, 'destroy']);
});