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

    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     summary="User register",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 ref="#/components/schemas/RegisterRequest",
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="number",
     *                 ),
     *                 @OA\Property(
     *                     property="identification",
     *                     type="number",
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     type="number",
     *                 ),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function __invoke(RegisterRequest $request)
    {
        $this->user = app(StoreUser::class)(
            $this->user->setCreate($request)
        );

        return $this->jsonResponse($this->user, 201);
    }
}
