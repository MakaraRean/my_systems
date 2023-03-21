<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JumpeakController;
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
Route::get("check_product", [ProductLogic::class, 'check_product']);


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


// Count Visitors
Route::get('count_visitors', [Controller::class, 'count_visitors'])->name('count_visitors');
Route::get('get_visitors', [Controller::class, 'get_visitors'])->name('get_visitors');


// Jumpeak API
Route::prefix('jumpeak')->group(function () {
    //Record
    Route::GET('records', [JumpeakController::class, 'get_record'])->name('get_record');
    Route::POST('new_record', [JumpeakController::class, 'new_record'])->name('new_record');
    Route::POST('delete_record', [JumpeakController::class, 'delete_record'])->name('delete_record');
    //Customer
    Route::GET('customers', [JumpeakController::class, 'get_customer'])->name('get_customer');
    Route::POST('new_customer', [JumpeakController::class, 'new_customer'])->name('new_customer');
});
