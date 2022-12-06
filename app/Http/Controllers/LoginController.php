<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $static_username = 'makara';
        $static_password = 123;
        if (!$request->isMethod('POST')) {
            return view('login');
        }
        $username = $request->username;
        $pass = $request->password;
        if ($username == $static_username && $pass == $static_password) {
            return 'Login Success';
        }
        return redirect('login')->with('message', 'Login Failed');
    }
}
