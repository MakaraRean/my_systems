<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            $category = new CategoryController();
            $categories = $category->getCategory();
            return view('product.add', ['categories' => $categories]);
        } else {
            $blister_per_unit = request()->blister_per_base;
            $talet_per_blister = request()->tablet_per_blister;
            $unit = request()->quantity;
            $tablet_qty = 0;
            $qty_type = "";

            $sell_as = request()->sell_as;
            if ($sell_as  == "sell_as_blister") {
                $tablet_qty = $unit * $blister_per_unit;
                $qty_type = "បន្ទះ/ប្រអប់";
            } else if ($sell_as  == "sell_as_tablet") {
                if ($blister_per_unit == null) {
                    $qty_type = "គ្រាប់";
                    $tablet_qty = $talet_per_blister * $unit;
                } else {
                    $tablet_qty = ($talet_per_blister * $blister_per_unit) * $unit;
                }
            } else if ($sell_as == "sell_as_other") {
                $qty_type = request()->sell_as_other_textbox;
            }
            $save = Product::Create([
                'code' => request()->code,
                'name' => request()->name,
                'category_id' => request()->category_id,
                'purchase_price' => request()->purchase_price,
                'sell_price' => request()->sell_price,
                'unit' => request()->unit,
                'qty' => $tablet_qty,
                'qty_type' => $qty_type,
                'blister_per_base' => request()->blister_per_base,
                'tablet_per_blister' => request()->tablet_per_blister,
                'desc' => request()->description,
            ]);
            if ($save) {
                return redirect()->route('add_product')->with('success', 'Product add successfully');
            } else {
                return redirect()->route('add_product')->with('failed', 'Product add unsuccessfully!');
            }
        }
    }
}
