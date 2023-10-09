<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('home');
        }

        // Đăng nhập thất bại, quay lại với thông báo lỗi
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không hợp lệ.',
        ])->withInput();
    }
}
