<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingSecurityController extends Controller
{
    public function login()
    {
        return view('wedding.security.login');
    }
}
