<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Logic\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        //request from api
        if ($request->is('api/*')) {
            try {
                $this->validate($request, [
                    'category' => 'exists:name|unique:name',
                ]);
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
                // $request->validate(
                //     [
                //         'name' => 'unique:categories,name'
                //     ],
                //     [
                //         'name.unique' => 'The name has already been taken'
                //     ]
                // );
                $validator = Validator::make(['name' => request()->name], [
                    'name' => 'unique:categories'
                ]);

                if ($validator->fails()) {
                    return redirect()->route('add_category')->with('exists_message', 'Category name already exists.');
                }


                $save = Category::Create([
                    'name' => request()->name,
                    'description' => request()->description
                ]);
                if ($save) {
                    return redirect()->route('add_category')->with('message', 'Add category successfully');
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
