<?php

namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\ApiController;
use App\Actions\Transaction\PaymentTransaction;
use App\Http\Requests\Api\Transaction\PaymentTransactionRequest;

class PaymentTransactionController extends ApiController
{
    /**
     * @OA\Post(
     *     path="/api/v1/transactions/payment",
     *     summary="Init payment transaction",
     *     tags={"Transaction"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/PaymentTransactionRequest",
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
     *                 type="string"
     *             ),
     *         ),
     *     ),
     * )
     */
    public function __invoke(PaymentTransactionRequest $request)
    {
        DB::beginTransaction();
        try {
            $transaction = app(PaymentTransaction::class)(
                $request->identification,
                $request->phone,
                $request->amount,
            );
            DB::commit();

            return $this->jsonResponse($transaction);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
    }
}
