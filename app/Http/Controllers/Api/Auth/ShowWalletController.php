<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\User\FindUserWallet;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Auth\ShowWalletRequest;

class ShowWalletController extends ApiController
{
    public function __invoke(ShowWalletRequest $request)
    {
        $wallet = app(FindUserWallet::class)(
            $request->identification,
            $request->phone,
        );

        return $this->jsonResponse($wallet);
    }
}
