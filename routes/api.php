<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ShowWalletController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', RegisterController::class);
    Route::post('/user/wallet', ShowWalletController::class);
});
