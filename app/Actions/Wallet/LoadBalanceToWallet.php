<?php

namespace App\Actions\Wallet;

use App\Models\Wallet;
use App\Actions\User\FindUser;
use App\Actions\Transaction\StoreTransaction;

class LoadBalanceToWallet
{
    private $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function __invoke(int $identification, int $phone, int $amount)
    {
        $user = app(FindUser::class)($identification, $phone);
        $this->wallet = $user->load(['wallet'])->wallet;

        app(StoreTransaction::class)($this->wallet, $amount);

        $this->wallet->update([
            'value' => $this->wallet->value + $amount
        ]);

        return $this->wallet;
    }
}
