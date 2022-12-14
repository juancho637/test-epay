<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\Response;

class FindUser
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(int $identification, int $phone)
    {
        $this->user = $this->user
            ->where('identification', $identification)
            ->where('phone', $phone)
            ->first();

        if (!$this->user) {
            throw new \Exception("User not found", Response::HTTP_NOT_FOUND);
        }

        return $this->user;
    }
}
