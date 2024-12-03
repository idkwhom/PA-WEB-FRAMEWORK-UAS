<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UkmController;
use App\Http\Controllers\API\RegisterController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/auth', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'store']);
    

    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('user', UserController::class);
        Route::get('/user/{id}/ukm', [UserController::class, 'own_ukm']);
        Route::post('/user/{id}/add_ukm', [UserController::class, 'add_ukm']);
        Route::post('/user/{id}/delete_ukm', [UserController::class, 'delete_ukm']);

        Route::post('/logout', [LoginController::class, 'logout']);

        Route::apiResource('ukm', UkmController::class);
    });
});
