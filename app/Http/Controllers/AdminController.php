<?php

namespace App\Http\Controllers;

use App\Http\Requests\Topic\TopicRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Carbon;
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

    // Xóa post (Trong tình huống không hợp lệ hoặc do nguyên nhân khác)
    public function deletePostUser(Request $request, $id){
        try {
            $post = Post::findOrFail($id);
            if($post) $post->delete();

            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => AdminController@deletePostUser => ". $exception->getMessage());
            return redirect()->route('post');
        }
        return redirect()->route('post');
    }

    public function showCreateTopic(){
        return view('admin.create_topic');
    }

    public function createTopic(TopicRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_at'] = Carbon::now();

            $topic = Topic::create($data);

            toastr()->success('Tạo chủ đề mới thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => AdminController@showCreateTopic => " . $exception->getMessage());
            toastr()->error('Tạo chủ đề mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('showCreateTopic');
        }
        return redirect()->route('topic');
    }

    public function showUpdateTopic($id){
        $topic = Topic::findOrFail($id);
        return view('admin.update_topic', compact('topic'));
    }

    public function updateTopic(TopicRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_at'] = Carbon::now();

            Topic::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => AdminController@showUpdateTopic => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('showUpdateTopic', $id);
        }
        return redirect()->route('topic', $id);
    }
}
