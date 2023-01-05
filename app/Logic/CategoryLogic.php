<?php

namespace App\Logic;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Logic\ApiResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryLogic extends ResourceCollection
{
    public function get_category(Request $request)
    {
        $active_page = $request->page ?? 1;
        $per_page = $request->per_page ?? 10;
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
        return [
            'total_record' => $number_of_category,
            'display_record' => count($categories),
            'total_page' => $all_page,
            'first_row' => $first_row,
            'last_row' => $last_row,
            'current_page' => $active_page,
            'categories' => $categories
        ];
    }

    public function add_category(Request $request)
    {
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
}
