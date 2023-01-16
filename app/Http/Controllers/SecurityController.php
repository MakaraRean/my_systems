<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function forget_password()
    {
        return view('security.forget_password');
    }
}
