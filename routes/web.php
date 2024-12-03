<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\DisableCsrfForApi;
use App\Http\Middleware\RedirectIfAuth;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;


Route::middleware([Authenticate::class])->group(function() {
   route::resource('dashboard', DashboardController::class);

   Route::resource('user', UserController::class);
   Route::post('/daftar/{id}', [UserController::class, 'daftarUkm']);    
   Route::post('/logout', [LoginController::class, 'destroy']);
   Route::post('/kick/{id}', [UkmController::class, 'kick']);
   Route::post('/accept/{id}', [UkmController::class, 'accept']);
   Route::resource('ukm', UkmController::class);
});

Route::middleware([RedirectIfAuth::class])->group(function() {
    Route::post('/auth', [LoginController::class, 'auth']);
    Route::resource('login', LoginController::class);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/store', [RegisterController::class, 'store']);
});