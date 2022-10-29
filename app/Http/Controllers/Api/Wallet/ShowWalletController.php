<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Actions\Wallet\FindWalletByUser;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Auth\ShowWalletRequest;

class ShowWalletController extends ApiController
{
    public function __invoke(ShowWalletRequest $request)
    {
        $wallet = app(FindWalletByUser::class)(
            $request->identification,
            $request->phone,
        );

        return $this->jsonResponse($wallet);
    }
}
