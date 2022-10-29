<?php

namespace App\Actions\Wallet;

use App\Models\Wallet;

class EgressBalanceToWallet
{
    private $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function __invoke(Wallet $wallet, int $amount)
    {
        $this->wallet = $wallet->update([
            'value' => $wallet->value - $amount
        ]);

        return $this->wallet;
    }
}
