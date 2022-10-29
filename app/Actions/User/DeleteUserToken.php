<?php

namespace App\Actions\User;

use App\Models\User;

class DeleteUserToken
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(User $user)
    {
        $this->user = $user->update([
            'token' => null
        ]);

        return $this->user;
    }
}
