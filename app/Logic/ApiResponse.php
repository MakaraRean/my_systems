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

    public static function not_found()
    {
        return response()->json(
            [
                'message' => 'Not Found',
                'message_kh' => 'មិនត្រូវបានរកឃើញ'
            ],
            404
        );
    }
}
