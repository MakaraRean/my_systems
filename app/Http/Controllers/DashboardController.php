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
            $categories = DB::table('categories')->limit(10);
            return view('dashboard.category', ['number_of_category' => $number_of_category, 'categories' => $categories]);
        }
    }
}
