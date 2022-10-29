<?php

namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\ApiController;
use App\Actions\Transaction\PaymentTransaction;
use App\Http\Requests\Api\Transaction\PaymentTransactionRequest;

class PaymentTransactionController extends ApiController
{
    public function __invoke(PaymentTransactionRequest $request)
    {
        DB::beginTransaction();
        try {
            $transaction = app(PaymentTransaction::class)(
                $request->identification,
                $request->phone,
                $request->amount,
            );

            return $this->jsonResponse($transaction);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
    }
}
