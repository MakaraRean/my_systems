<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;

class DashboardController extends Controller
{

    public function getData($table, Request $request)
    {
        $active_page = $request->page ?? 1;
        $per_page = 10;
        $number_of_category = DB::table($table)->count();
        $page = $number_of_category / $per_page;
        $all_page = 0;
        for ($i = 0; $i < $page; $i++) {
            $all_page += 1;
        }
        $offset = ($active_page - 1) * $per_page;
        $first_row = $offset + 1;
        if ($offset + $per_page > $number_of_category)
            $last_row = $number_of_category;
        else
            $last_row = $offset + $per_page;
        $data = DB::table($table)->offset($offset)->limit($per_page)->get();


        if ($table == 'categories') {
            return view(
                'dashboard.category',
                [
                    'categories' => $data,
                    'page_active' => $active_page,
                    'number_of_category' => $number_of_category,
                    'all_page' => $all_page,
                    'first_row' => $first_row,
                    'last_row' => $last_row
                ]
            );
            // return $data;
        }
    }


    public function dashboard(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('dashboard.dashboard');
        }
    }

    public function chart(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('dashboard.chart');
        }
    }

    public function table(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('dashboard.table');
        }
    }

    public function product(Request $request)
    {
        $active_page = $request->page ?? 1;
        $per_page = 10;
        $number_of_product = DB::table('products')->count();
        $page = $number_of_product / $per_page;
        $all_page = 0;
        for ($i = 0; $i < $page; $i++) {
            $all_page += 1;
        }
        $offset = ($active_page - 1) * $per_page;
        $first_row = $offset + 1;
        if ($offset + $per_page > $number_of_product)
            $last_row = $number_of_product;
        else
            $last_row = $offset + $per_page;
        $data = DB::table('products')->offset($offset)->limit($per_page)->get();
        return view(
            'dashboard.product',
            [
                'data' => $data,
                'first_row' => $first_row,
                'last_row' => $last_row,
                'all_page' => $all_page,
                'page_active' => $active_page,
                'number_of_product' => $number_of_product,

            ]
        );
    }

    public function category(Request $request)
    {
        if ($request->isMethod('GET')) {
            $active_page = $request->page ?? 1;
            $per_page = 10;
            $number_of_category = DB::table('categories')->count();

            $page = $number_of_category / $per_page;
            $all_page = 0;
            for ($i = 0; $i < $page; $i++) {
                $all_page += 1;
            }
            $offset = ($active_page - 1) * $per_page;
            $first_row = $offset + 1;
            if ($offset + $per_page > $number_of_category)
                $last_row = $number_of_category;
            else
                $last_row = $offset + $per_page;
            $categories = DB::table('categories')->offset($offset)->limit($per_page)->where('is_active', '=', 1)->get();
            return view(
                'dashboard.category',
                [
                    'number_of_category' => $number_of_category,
                    'categories' => $categories,
                    'all_page' => $all_page,
                    'first_row' => $first_row,
                    'last_row' => $last_row,
                    'page_active' => $active_page,
                ]
            );
        }
    }

    public function categoryByPage(Request $request)
    {
        $active_page = $request->page ?? 1;
        $per_page = 10;
        $number_of_category = DB::table('categories')->count();
        $page = $number_of_category / $per_page;
        $all_page = 0;
        for ($i = 0; $i < $page; $i++) {
            $all_page += 1;
        }
        $offset = ($active_page - 1) * $per_page;
        $first_row = $offset + 1;
        if ($offset + $per_page > $number_of_category)
            $last_row = $number_of_category;
        else
            $last_row = $offset + $per_page;
        $categories = DB::table('categories')->offset($offset)->limit($per_page)->get();
        return view(
            'dashboard.category',
            [
                'categories' => $categories,
                'page_active' => $active_page,
                'number_of_category' => $number_of_category,
                'all_page' => $all_page,
                'first_row' => $first_row,
                'last_row' => $last_row
            ]
        );
    }



    public function t($table, Request $request)
    {
        return $table;
    }
}
