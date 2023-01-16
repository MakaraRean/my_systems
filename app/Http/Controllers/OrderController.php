<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (request()->isMethod('GET')) {
            return view('order.index');
        }
    }
}
