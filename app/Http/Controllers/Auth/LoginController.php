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

            // Lấy user vừa đăng nhập
            $user = Auth::user();
            
            // Lưu thông tin vào session
            session([
                'user_id' => $user->id,
                'username' => $user->user,
                'role' => $user->role,
            ]);

            // Kiểm tra role và redirect
            if ($user->role == 0) {
                return redirect()->route('admin.trangchu');
            } elseif ($user->role == 1) {
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['username' => 'Tài khoản không hợp lệ!'])->withInput();
            }
        }

        // Nếu đăng nhập thất bại, trả về lỗi
        return back()->withErrors([
            'username' => 'Tài khoản hoặc mật khẩu không đúng.',
        ])->withInput();
    }

    
}
