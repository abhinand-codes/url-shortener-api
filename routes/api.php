<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShortUrlController;

Route::middleware('api')->group(function () {
    Route::post('/short-urls', [ShortUrlController::class, 'store']);
});
