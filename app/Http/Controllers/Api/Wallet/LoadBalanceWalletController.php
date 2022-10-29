<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Actions\Wallet\LoadBalanceToWallet;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Wallet\LoadBalanceWalletRequest;

class LoadBalanceWalletController extends ApiController
{
    /**
     * @OA\Post(
     *     path="/api/v1/wallets/load",
     *     summary="Load wallet",
     *     tags={"Wallet"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/LoadBalanceWalletRequest",
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="number",
     *                 ),
     *                 @OA\Property(
     *                     property="value",
     *                     type="number",
     *                 ),
     *             ),
     *         ),
     *     ),
     * )
     */
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
