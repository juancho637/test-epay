<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Actions\Wallet\LoadBalanceToWallet;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Wallet\LoadBalanceWalletRequest;

class LoadBalanceWalletController extends ApiController
{
    public function __invoke(LoadBalanceWalletRequest $request)
    {
        $wallet = app(LoadBalanceToWallet::class)(
            $request->identification,
            $request->phone,
            $request->amount,
        );

        return $this->jsonResponse($wallet);
    }
}
