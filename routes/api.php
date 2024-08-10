<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route pour afficher tout les Guides
Route::get('/guides', [GuideController::class, 'index']);


//Route pour creer des guides
Route::post('/guides', [GuideController::class, 'store']);

//Route pour Show,Update et delete
Route::get('/guides/{id}', [GuideController::class, 'show']);
Route::put('/guides/{id}', [GuideController::class, 'update']);
Route::delete('/guides/{id}', [GuideController::class, 'destroy']);
