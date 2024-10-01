<?php

namespace App\Traits\api;

trait ApiResponser
{
    protected function respondValidationErrors($message, $data, $status_code = 400)
    {
        return response()->json([
            'metadata' => [
                'isSuccess' => false,
                'message' => $message,
                'statusCode' => $status_code,
            ],
            'errors' => $data,
        ], $status_code);
    }

    protected function successResponse($message, $data, $status_code = 201)
    {
        return response()->json([
            'meatadata' => [
                'isSuccess' => true,
                'statusCode' => $status_code,
                'message' => $message,
            ],
            'data' => $data,
        ], $status_code);
    }

    protected function issueResponse($message, $code, $status_code)
    {
        return response()->json([
            'meatadata' => [
                'message' => $message,
                'code' => $code,
                'statusCode' => $status_code,
            ],
        ], $status_code);
    }

    protected function successResponse2($message, $data, $status_code = 201)
    {
        return response()->json([
            'isSuccess' => true,
            'message' => $message,
            'data' => $data,
            'statusCode' => $status_code,
        ], $status_code);
    }

    protected function errorResponse($message = 'Fail', $status_code = null)
    {
        return response()->json([
            'isSuccess' => false,
            'message' => $message,
            'statusCode' => $status_code,
        ], $status_code);
    }

    protected function respondUnAuthorized($message = 'Unauthorized')
    {
        return response()->json([
            'isSuccess' => false,
            'message' => $message,
            'statusCode' => 401,
        ], 401);
    }
}
