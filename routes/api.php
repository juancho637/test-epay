<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', RegisterController::class);
});
