<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Actions\User\StoreUser;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Auth\RegisterRequest;

class RegisterController extends ApiController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(RegisterRequest $request)
    {
        $this->user = app(StoreUser::class)(
            $this->user->setCreate($request)
        );

        return $this->jsonResponse($this->user, 201);
    }
}
