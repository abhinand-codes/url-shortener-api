<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShortUrlController;

Route::post('/short-urls', [ShortUrlController::class, 'store']);
Route::get('/short-urls/{code}/stats', [ShortUrlController::class, 'stats']);
