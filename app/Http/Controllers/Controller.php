<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function count_visitors(Request $request)
    {
        $ip = $request->ip();
        $date = date('Y-m-d');
        $check = DB::table('visitors')->where('ip', $ip)->where('is_active', '=', '1')->first();
        if ($check) {
            $count = $check->count + 1;
            DB::table('visitors')->where('ip', $ip)->update(['count' => $count]);
        } else {
            DB::table('visitors')->insert([
                'ip' => $ip,
                'date' => $date,
                'count' => 1,
            ]);
        }
    }

    public function get_visitors(Request $request)
    {
        $this->count_visitors($request);
        $visitors = DB::table('visitors')->where('is_active', '=', '1')->sum('count');
        $response = [
            'message' => 'success',
            'visitors' => $visitors,
        ];

        return $response;
    }
}
