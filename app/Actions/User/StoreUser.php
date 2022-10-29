<?php

namespace App\Actions\User;

use App\Models\User;

class StoreUser
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(array $fields)
    {
        $this->user = $this->user->create($fields);

        $this->user->wallet()->create();

        return $this->user;
    }
}
