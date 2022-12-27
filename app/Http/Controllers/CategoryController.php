<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('category.add');
        } else {
            $save = Category::Create([
                'name' => request()->name,
                'description' => request()->description
            ]);
            if ($save) {
                return redirect()->route('add_category')->with('message', 'Add category successfully');
            }
        }
    }

    public function getCategory()
    {
        $categories = DB::table('categories')->where('is_active', 1)->get();
        return $categories;
    }
}
