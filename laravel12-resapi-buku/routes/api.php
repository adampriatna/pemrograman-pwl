<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;

// Autentikasi
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1');

// Endpoint yang membutuhkan token Sanctum
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/logout', [AuthController::class, 'logout']);

    // Menghapus akun pengguna yang sedang login
    Route::delete('/account', [AuthController::class, 'deleteAccount']);

    // CRUD Buku
    Route::apiResource('books', BookController::class);

});