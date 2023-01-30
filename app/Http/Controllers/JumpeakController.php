<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Logic\ApiResponse;
use App\Models\JumpeakCustomer;
use App\Models\JumpeakRecord;
use Illuminate\Http\Request;

class JumpeakController extends Controller
{
    public function get_record(Request $request)
    {
        $search_customer_name = $request->query('search_customer_name');
        $customer_name = $request->query('customer_name');
        if ($search_customer_name) {
            $records = DB::table('jumpeak_records')->where('is_active', true)->where('customer_name','like', "%{$search_customer_name}%")->get();
        }
        elseif ($customer_name)
            $records = DB::table('jumpeak_records')->where('is_active', true)->where('customer_name','=', "$customer_name")->get();
        else
            $records = DB::table('jumpeak_records')->where('is_active', true)->get();
        if (count($records)) {
            return $records;
        }
        return ApiResponse::no_data();
    }

    public function get_record_by_customer_name(){
        $customer_name = request()->name;
        $customers = DB::table('jumpeak_records')->where('is_active','=',true)->where('customer_name',$customer_name)->get();
        if (count($customers)){
            return $customers;
        }
        return ApiResponse::no_data();
    }

    public function new_record()
    {
        try {
            $save = JumpeakRecord::Create([
                'amount' => request()->amount,
                'type' => request()->type,
                'qty' => request()->qty,
                'full_price' => request()->full_price,
                'sell_price' => request()->sell_price,
                'all_owe' => request()->all_owe,
                'paid' => request()->paid,
                'going_to_pay' => request()->going_to_pay,
                'customer_name' => request()->customer_name,
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


    public function delete_record()
    {
        $id = request()->id;
        if ($id) {
            try {
                $updated = JumpeakRecord::where('id', $id)->update(['is_active' => false]);
                if ($updated) {
                    return ApiResponse::delete_success();
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
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
