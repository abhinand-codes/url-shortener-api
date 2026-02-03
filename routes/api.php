<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShortUrlController;

Route::post('/short-urls', [ShortUrlController::class, 'store']);
Route::get('/short-urls/{code}/stats', [ShortUrlController::class, 'stats']);
Route::put('/short-urls/{code}', [ShortUrlController::class, 'update']);
Route::delete('/short-urls/{code}', [ShortUrlController::class, 'destroy']);
