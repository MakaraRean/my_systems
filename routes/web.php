<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

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

Route::get('/test', function () {
    return "Test";
});
Route::get('/hello', [MainController::class, 'hello'])->name('hello');
//LoginController
Route::any('/login', [LoginController::class, 'login'])->name('login');
//DashboardController
Route::any('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::any('/chart', [DashboardController::class, 'chart'])->name('chart');
