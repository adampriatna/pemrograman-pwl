<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', fn () => redirect('/books'));
Route::get('/books', [BookController::class, 'index']);
