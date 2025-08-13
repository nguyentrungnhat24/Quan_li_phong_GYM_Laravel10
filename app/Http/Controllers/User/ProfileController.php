<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();
        
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'phone' => 'nullable|string|max:20',
    //         'address' => 'nullable|string|max:500',
    //     ]);
        
    //     $user->update($request->only(['name', 'email', 'phone', 'address']));
        
    //     return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    // }

    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required|current_password',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);
        
    //     $user = Auth::user();
    //     $user->update(['password' => Hash::make($request->password)]);
        
    //     return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    // }

    public function showChangePasswordForm()
    {
        return view('user.profile.change-password');
    }
}
