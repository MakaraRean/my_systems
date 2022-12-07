<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function test()
    {
        $users = DB::table('users')->get();
        return $users;
    }
}
