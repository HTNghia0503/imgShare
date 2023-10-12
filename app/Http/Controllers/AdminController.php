<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $users = User::all(); // Lấy danh sách tất cả người dùng
        return view('admin.dashboard', ['users' => $users]);
    }
}
