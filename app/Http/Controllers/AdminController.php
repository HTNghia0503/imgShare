<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Post;
// use App\Models\Topic;

class AdminController extends Controller
{
    // Hiển thị trang mặc định Dashboard khi Admin login vào - dùng để quản lý tài khoản
    public function dashboard(){
        $users = User::all();
        return view('admin.dashboard', ['users' => $users]);
    }

    // Hiển thị trang bài đăng sau khi chọn trên Sidebar
    // public function managePost(){
    //     $posts = POST::all();
    //     return view('admin.post_manage', ['posts' => $posts]);
    // }

    // Hiển thị trang Chủ đề sau khi chọn trên Sidebar
    // public function manageTopic(){
    //     $topics = TOPIC::all();
    //     return view('admin.post_manage', ['topics' => $topics]);
    // }
}
