<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function respondJson($success, $responseMessage, $code, $data = []): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $responseMessage,
            'data' => $data
        ], $code);
    }

    public function respondJsonWithToken($token, $responseMessage, $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $responseMessage,
            'data' => $data,
            'token' => $token,
            'token_type' => 'bearer',
        ], 200);
    }
}
