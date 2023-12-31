<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'code' => $status,
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    public static function error($message, $status = 400)
    {
        return response()->json([
            'code' => $status,
            'status' => 'error',
            'message' => $message,
        ], $status);
    }

    public static function notFound($message, $status = 404)
    {
        return response()->json([
            'code' => $status,
            'status' => 'error',
            'message' => $message,
        ], $status);
    }
}
