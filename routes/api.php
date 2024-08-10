<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;

 Route::get('/user', function (Request $request) {
     return $request->user();
 })->middleware('auth:sanctum');


//Route pour afficher toute les Ressources
Route::get('/ressources',[RessourceController::class, 'index']);

//Route pour creer une ressource
Route::post('/ressources', [RessourceController::class, 'store']);

//Route pour detail, modifier et supprimer une ressource

Route::get('/ressources/{id}', [RessourceController::class, 'show']);
Route::put('/ressources/{id}', [RessourceController::class, 'update']);
Route::delete('/ressources/{id}', [RessourceController::class, 'destroy']);
