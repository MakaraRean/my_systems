<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Logic\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        //request from api
        if ($request->is('api/*')) {
            try {
                $save = Category::Create([
                    'name' => request()->name,
                    'description' => request()->description ?? ""
                ]);
                if ($save) {
                    return ApiResponse::create_success();
                }
            } catch (\Throwable $th) {
                return response()->json(['message' => $th->getMessage()], 400);
            }
        }
        //request from web
        else {
            if ($request->isMethod('GET')) {
                return view('category.add');
            } else {
                try {
                    $save = Category::Create([
                        'name' => request()->name,
                        'description' => request()->description
                    ]);
                    if ($save) {
                        return redirect()->route('add_category')->with('message', 'Add category successfully');
                    }
                } catch (\Throwable $th) {
                    //validate this if name exist
                }
            }
        }
    }

    public function getCategory()
    {
        $categories = DB::table('categories')->where('is_active', 1)->get();
        return $categories;
    }
}
