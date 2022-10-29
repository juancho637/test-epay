<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Test ePayco API Documentation",
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST
 * )
 */
class ApiController extends Controller
{
    use ApiResponse;
}
