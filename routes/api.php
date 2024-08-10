<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('discussions', DiscussionController::class);
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('discussions/search', [DiscussionController::class, 'search'])->name('discussions.search');