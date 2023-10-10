<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' =>  $request->password,
        ];
        // dd($request->all());
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
