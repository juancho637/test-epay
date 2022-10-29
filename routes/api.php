<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Wallet\ShowWalletController;
use App\Http\Controllers\Api\Wallet\LoadBalanceWalletController;
use App\Http\Controllers\Api\Transaction\PaymentTransactionController;

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', RegisterController::class);
    Route::post('/wallets/balance', ShowWalletController::class);
    Route::post('/wallets/load', LoadBalanceWalletController::class);
    Route::post('/transactions/payment', PaymentTransactionController::class);
});
