<?php

use App\Http\Controllers\CategoryController;
use App\Logic\CategoryLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Logic\ProductLogic;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get(
    "get_product",
    [ProductLogic::class, 'get_products']
);


Route::prefix('category')->group(function () {
    Route::get(
        "get",
        [CategoryLogic::class, 'get_category']
    );
    Route::POST(
        "add",
        [CategoryController::class, 'add']
    );
});
