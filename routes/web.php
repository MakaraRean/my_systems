<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WeddingSecurityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', [MainController::class, 'test'])->name('test');
//LoginController
Route::any('/login', [LoginController::class, 'login'])->name('login');
//DashboardController
Route::any('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::any('/chart', [DashboardController::class, 'chart'])->name('chart');
Route::any('/table', [DashboardController::class, 'table'])->name('table');
Route::any('/product', [DashboardController::class, 'product'])->name('product');
Route::any('/category', [DashboardController::class, 'category'])->name('category');
Route::any('/addCategory', [CategoryController::class, 'add']);
//Route::any('/category/add', [CategoryController::class, 'add'])->name('add_category');
//CategoryController
Route::prefix('category')->group(function () {
    Route::any('/add', [CategoryController::class, 'add'])->name('add_category');
});
//ProductController
Route::prefix('product')->group(function () {
    Route::any('/add', [ProductController::class, 'add'])->name('add_product');
});

//OrderController
Route::prefix('order')->group(function () {
    Route::any('/new', [OrderController::class, 'new_order'])->name('new_order');
    Route::POST('/add', [OrderController::class, 'add'])->name('add_order');
});



//SecurityController
Route::prefix('security')->group(function () {
    Route::GET('/forget-password', [SecurityController::class, 'forget_password'])->name('forget_password');
});


//WeddingApp
Route::prefix('wedding')->group(function () {
    Route::GET('/login', [WeddingSecurityController::class, 'login'])->name('wedding_login');
});
