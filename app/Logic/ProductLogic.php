<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductLogic
{
    public function get_products(Request $request)
    {
        $total_record = DB::table('products')->count();

        $active_page = $request->page ?? 1;
        $per_page = $request->per_page ?? 10;
        $page = $total_record / $per_page;
        $all_page = 0;
        for ($i = 0; $i < $page; $i++) {
            $all_page += 1;
        }
        $offset = ($active_page - 1) * $per_page;
        $first_row = $offset + 1;
        if ($offset + $per_page > $total_record)
            $last_row = $total_record;
        else
            $last_row = $offset + $per_page;

        $products = DB::table('products')->offset($offset)->limit($per_page)->get();
        $display_record = count($products);
        $data = array(
            'first_row' => $first_row,
            'last_row' => $last_row,
            'total_page' => $all_page,
            'current_page' => $active_page,
            'display_record' => $display_record,
            'total_record' => $total_record,
            "products" => $products
        );
        return $data;
    }

    public function check_product(Request $request)
    {
        $id = $request->product_id;
        // $product = DB::table('products')
        //     ->where([['is_active', '=', 1], ['code', '=', $id]])
        //     ->orWhere('id', '=', $id)->first();
        $product = DB::table('products')
            ->where('is_active', '=', 1)
            ->where('code', '=', $id)
            ->orWhere('id', '=', $id)->first();
        if ($product) {
            return ApiResponse::found();
        }
        return ApiResponse::not_found();
    }

    public function search_product(String $id = null)
    {
        $product = DB::table('products')
            ->where('is_active', '=', 1)
            ->where('code', '=', $id)
            ->orWhere('id', '=', $id)->first();
        return $product;
    }
}
