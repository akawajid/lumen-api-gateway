<?php

namespace App\Traits;

trait ApiResponse{
    public function success($data, $code = '200'){
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    public function error($message, $code){
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }

    public function errorMessage($message, $code){
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}