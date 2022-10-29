<?php

namespace App\Actions\Transaction;

use App\Models\Wallet;
use App\Models\Transaction;

class StoreTransaction
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(
        Wallet $wallet,
        int $amount,
        string $type = Transaction::TYPE_INCOM,
    ) {
        $status = Transaction::STATUS_ENABLED;
        $code = null;

        if ($type === Transaction::TYPE_EGRESS) {
            $status = Transaction::STATUS_PENDING;
            $code = rand(111111, 999999);
        }

        $this->transaction = $this->transaction->create([
            'wallet_id' => $wallet->id,
            'value' => $amount,
            'type' => $type,
            'status' => $status,
            'confirmation_code' => $code,
        ]);

        return $this->transaction;
    }
}
