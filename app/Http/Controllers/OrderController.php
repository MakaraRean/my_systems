<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\ProductLogic;

class OrderController extends Controller
{
    public function new_order()
    {
        if (request()->isMethod('GET')) {
            return view('order.add');
        }
    }

    public function add(Request $request)
    {
        $pid = $request->product_id;
        $qty = $request->qty ?? 1;
        $product_logic = new ProductLogic;
        $product = $product_logic->search_product($pid);
        if ($product) {
            return $product;
        }
        return redirect()->route('new_order')->with('error_message', "Product $pid not found!");
    }
}
