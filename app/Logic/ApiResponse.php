<?php

namespace App\Logic;


class ApiResponse
{
    public static function error_response($message, $message_kh, $error, $code)
    {
        return response()->json(
            [
                'message' => $message ?? 'Error',
                'message_kh' => $message_kh ?? 'មានបញ្ហា',
                'error' => $error
            ],
            $code ?? 400
        );
    }
    public static function create_success()
    {
        return response()->json(
            [
                'message' => 'Create successfully',
                'message_kh' => 'បង្កើតបានដោយជោគជ័យ'
            ],
            201
        );
    }


    public static function create_failed()
    {
        return response()->json(['message' => 'Create failed', 'message_kh' => 'ការបង្កើតមិនជោគជ័យ'], 400);
    }
}
