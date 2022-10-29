<?php

namespace App\Actions\Transaction;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Response;
use App\Actions\User\DeleteUserToken;
use App\Actions\User\FindUserByToken;
use App\Actions\Wallet\EgressBalanceToWallet;
use App\Actions\Transaction\DeleteTransactionCode;

class ConfirmPaymentTransaction
{
    private $transaction;
    private $user;
    private $wallet;

    public function __construct(
        Transaction $transaction,
        User $user,
        Wallet $wallet,
    ) {
        $this->transaction = $transaction;
        $this->user = $user;
        $this->wallet = $wallet;
    }

    public function __invoke(
        string $userToken,
        int $transactionCode
    ) {
        $this->user = app(FindUserByToken::class)($userToken);
        $this->wallet = $this->user->wallet;
        $this->transaction = $this->wallet
            ->transactions()
            ->where('confirmation_code', $transactionCode)
            ->first();

        if (!$this->transaction) {
            throw new \Exception("Transaction not found", Response::HTTP_NOT_FOUND);
        }

        app(EgressBalanceToWallet::class)($this->wallet, $this->transaction->value);
        app(DeleteUserToken::class)($this->user);
        app(DeleteTransactionCode::class)($this->transaction);

        return "Payment confirmation was successful.";
    }
}
