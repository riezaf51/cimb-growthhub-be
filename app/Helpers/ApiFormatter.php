<?php

namespace App\Helpers;

class ApiFormatter {
    protected static $response = [
        'success' => null,
        'message' => null,
    ];

    public static function createApi($success, $message, $data, $code = 200) {
        self::$response['success'] = $success;
        self::$response['message'] = $message;
        if ($data) {
            self::$response['data'] = $data;
        }

        return response()->json(self::$response, $code);
    }
}