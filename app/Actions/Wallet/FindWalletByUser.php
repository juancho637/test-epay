<?php

namespace App\Actions\Wallet;

use App\Actions\User\FindUser;

class FindWalletByUser
{
    public function __invoke(int $identification, int $phone)
    {
        $user = app(FindUser::class)($identification, $phone);
        $wallet = $user->load(['wallet'])->wallet;

        return $wallet;
    }
}
