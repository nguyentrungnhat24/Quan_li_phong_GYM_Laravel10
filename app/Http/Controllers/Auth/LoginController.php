<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signin_signup.signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => 'Yêu cầu nhập tài khoản',
            'password.required' => 'Yêu cầu nhập mật khẩu',
        ]);

        if (Auth::attempt(['user' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // hoặc route dashboard
        }

        return back()->withErrors([
            'username' => 'Tài khoản hoặc mật khẩu không đúng.',
        ])->withInput();
    }
}
