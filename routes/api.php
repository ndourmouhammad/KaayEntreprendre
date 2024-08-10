<?php

use Illuminate\Http\Request;
use App\Models\RetourExperience;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\RetourExperienceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Resource('retour-experience',RetourExperienceController::class);

Route::Resource('evenement',EvenementController::class);