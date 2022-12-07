<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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
        if ($request->isMethod('GET')) {
            return view('dashboard.product');
        }
    }

    public function category(Request $request)
    {
        if ($request->isMethod('GET')) {
            $number_of_category = DB::table('categories')->count();
            $per_page = 10;
            $categories = DB::table('categories')->limit($per_page)->get();
            $page = $number_of_category / $per_page;
            $all_page = 0;
            for ($i = 0; $i < $page; $i++) {
                $all_page += 1;
            }
            return view(
                'dashboard.category',
                ['number_of_category' => $number_of_category, 'categories' => $categories, 'all_page' => $all_page]
            );
        }
    }

    public function categoryByPage($page)
    {
        $per_page = 10;
        $number_of_category = DB::table('categories')->count();
        $page = $number_of_category / $per_page;
        $all_page = 0;
        for ($i = 0; $i < $page; $i++) {
            $all_page += 1;
        }
        $offset = ($page - 1) * $per_page;
        $categories = DB::table('categories')->offset($offset)->limit($per_page)->get();
        return view(
            'dashboard.category',
            [
                'categories' => $categories,
                'page_active' => $page,
                'number_of_category' => $number_of_category,
                'all_page' => $all_page
            ]
        );
    }
}
