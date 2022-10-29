<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\Response;

class FindUserByToken
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(string $token)
    {
        $this->user = $this->user->where('token', $token)->first();

        if (!$this->user) {
            throw new \Exception("User not found", Response::HTTP_NOT_FOUND);
        }

        return $this->user;
    }
}
