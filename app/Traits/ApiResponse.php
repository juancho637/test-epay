<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    protected function jsonResponse($data, $code = Response::HTTP_OK, $success = true)
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'code' => $code,
        ], $code);
    }
}
