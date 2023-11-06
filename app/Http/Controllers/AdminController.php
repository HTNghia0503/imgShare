<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Hiển thị trang mặc định khi Admin login vào - dùng để quản lý tài khoản
    public function manageAccount(){
        $users = User::all();
        return view('admin.account_manage', ['users' => $users]);
    }

    // Hiển thị trang bài đăng sau khi chọn trên Sidebar
    public function managePost(){
        $posts = Post::all();
        return view('admin.post_manage', ['posts' => $posts]);
    }

    // Hiển thị trang Chủ đề sau khi chọn trên Sidebar
    public function manageTopic(){
        $topics = Topic::all();
        return view('admin.topic_manage', ['topics' => $topics]);
    }

    // Xóa tài khoản người dùng (Trong tình huống không hợp lệ hoặc do nguyên nhân khác)
    public function deleteAccount(Request $request, $id){
        try {
            $user = User::findOrFail($id);
            if($user) $user->delete();

            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => AdminController@deleteAccount => ". $exception->getMessage());
            return redirect()->route('account');
        }
        return redirect()->route('account');
    }

}
