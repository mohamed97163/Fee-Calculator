<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait ResponseTrait
{

    public function returnError($msg, $code): void
    {
        abort($code, $msg);
    }
    public function success($msg,$code): JsonResponse
    {
        return Response::json([
            'status' => 'success',
            'code' => $code,
            'message' => $msg,
        ]);
    }
    public function returnData($msg, $code, $value): JsonResponse
    {
        return Response::json([
            'status' => 'success',
            'code' => $code,
            'message' => $msg,
            'data' => $value,
        ]);
    }
}
