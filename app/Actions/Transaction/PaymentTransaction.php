<?php

namespace App\Actions\Transaction;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Actions\User\FindUser;
use App\Actions\User\CreateUserToken;
use App\Actions\Transaction\StoreTransaction;
use App\Notifications\Transaction\ConfirmTransactionNotification;

class PaymentTransaction
{
    private $transaction;
    private $wallet;
    private $user;

    public function __construct(
        Transaction $transaction,
        Wallet $wallet,
        User $user
    ) {
        $this->transaction = $transaction;
        $this->wallet = $wallet;
        $this->user = $user;
    }

    public function __invoke(int $identification, int $phone, int $amount)
    {
        $this->user = app(FindUser::class)($identification, $phone);
        $this->wallet = $this->user->load(['wallet'])->wallet;

        if ($this->wallet->value < $amount) {
            throw new \Exception("Insufficient balance");
        }

        app(CreateUserToken::class)($this->user);

        $this->transaction = app(StoreTransaction::class)(
            $this->wallet,
            $amount,
            Transaction::TYPE_EGRESS
        );

        $this->user->notify(
            new ConfirmTransactionNotification(
                $this->user->token,
                $this->transaction->confirmation_code
            )
        );

        return "An email has been sent to confirm the purchase, please check your email inbox.";
    }
}
