<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function test()
    {
        $users = DB::table('users')->get();
        return $users;
    }

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
            'all_page' => $all_page,
            'page_active' => $active_page,
            'display_record' => $display_record,
            'total_record' => $total_record,
            "products" => $products
        );
        return $data;
    }
}
