<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
