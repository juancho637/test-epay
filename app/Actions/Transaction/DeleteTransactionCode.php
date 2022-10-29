<?php

namespace App\Actions\Transaction;

use App\Models\Transaction;

class DeleteTransactionCode
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(Transaction $transaction)
    {
        $this->transaction = $transaction->update([
            'confirmation_code' => null,
            'status' => Transaction::STATUS_ENABLED
        ]);

        return $this->transaction;
    }
}
