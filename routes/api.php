<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/refresh', [AuthController::class, 'refreshToken']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
Route::post('/user/update', [AuthController::class, 'update'])->middleware('auth:api');