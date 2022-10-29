<?php

namespace App\Http\Controllers\Api\Wallet;

use App\Actions\Wallet\FindWalletByUser;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Auth\ShowWalletRequest;

class ShowWalletController extends ApiController
{
    /**
     * @OA\Post(
     *     path="/api/v1/wallets/balance",
     *     summary="Show wallet balance",
     *     tags={"Wallet"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/ShowWalletRequest",
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
    public function __invoke(ShowWalletRequest $request)
    {
        $wallet = app(FindWalletByUser::class)(
            $request->identification,
            $request->phone,
        );

        return $this->jsonResponse($wallet);
    }
}
