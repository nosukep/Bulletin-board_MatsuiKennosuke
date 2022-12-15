<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// vendor/laravel/framework/src/Illuminate

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginView()
    {
        return view('auth.login.login');
    }

    public function loginPost(Request $request)
    {
        $userdata = $request -> only('mail_address', 'password');
        if (Auth::attempt($userdata)) {
            return redirect('/top');
        }else{
            return redirect('/login')->with('flash_message', 'name or password is incorrect');
        }
    }
}
