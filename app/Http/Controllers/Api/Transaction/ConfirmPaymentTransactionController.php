<?php

namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\ApiController;
use App\Actions\Transaction\ConfirmPaymentTransaction;

class ConfirmPaymentTransactionController extends ApiController
{
    public function __invoke(Request $request)
    {
        $userToken = $request->get('token', '');
        $transactionCode = $request->get('code', '');

        DB::beginTransaction();
        try {
            $transaction = app(ConfirmPaymentTransaction::class)(
                $userToken,
                $transactionCode,
            );
            DB::commit();

            return $this->jsonResponse($transaction);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
    }
}
