<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Http\Controllers\Api\V1\OrderController;

    Route::prefix('v1')->group(function(){
        // Route::GET("upload",DocumentController::class);
        Route::resource('users', UserController::class)->only([
            'index', 'show'
        ]);
        Route::resource('orders', OrderController::class)->only([
            'index', 'show'
        ]);
    });


