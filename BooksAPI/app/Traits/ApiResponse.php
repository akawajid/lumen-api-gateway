<?php

namespace App\Traits;

trait ApiResponse{
    public function success($data, $code = '200'){
        return response()->json([
            'data' => $data,
        ], $code);
    }

    public function error($message, $code){
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }
}