<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Str;

class CreateUserToken
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(User $user)
    {
        $this->user = $user->update([
            'token' => Str::random(10)
        ]);

        return $this->user;
    }
}
