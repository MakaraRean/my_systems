<?php

namespace App\Logic;


class ApiResponse
{
    public function standard_response($message, $message_kh, $code)
    {
        return response()->json(
            [
                'message' => $message ?? 'Success',
                'message_kh' => $message_kh ?? 'ជោគជ័យ'
            ],
            $code ?? 200
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
}
