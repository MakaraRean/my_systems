<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Logic\ApiResponse;
use App\Models\JumpeakCustomer;
use App\Models\JumpeakRecord;
use Illuminate\Http\Request;

class JumpeakController extends Controller
{
    public function get_record()
    {
        $records = JumpeakRecord::all();
        return $records;
    }

    public function new_record()
    {
        try {
            $save = JumpeakRecord::Create([]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // Customer
    public function new_customer()
    {
        try {
            $save = JumpeakCustomer::Create([
                'name' => request()->name,
                'address' => request()->address,
                'phone' => request()->phone
            ]);
            if ($save) {
                return ApiResponse::create_success();
            } else {
                return ApiResponse::create_failed();
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function get_customer(Request $request)
    {
        $name = $request->query('name');
        if ($name) {
            $customers = DB::table('jumpeak_customers')->where('is_active', '=', 1)->where('name', 'like', "%{$name}%")->get();
            if (count($customers))
                return $customers;
            return ApiResponse::no_data();
        }
        $customers = DB::table('jumpeak_customers')->where('is_active', '=', 1)->get();
        if (count($customers)) {
            return $customers;
        }
        return ApiResponse::no_data();
    }
}
