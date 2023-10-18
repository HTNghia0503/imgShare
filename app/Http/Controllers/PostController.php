<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        $collections = Collection::where('user_id', auth()->user()->id)->get(); // Xác định các Collections thuộc sở hữu của người đang Đăng nhập

        return view('post.create', ['collections' => $collections, 'users'=> $users]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all(); // Lấy dữ liệu từ $request gửi lên
            $data['user_id'] = auth()->user()->id; // Lấy ID của người đăng nhập
            $data['created_at'] = Carbon::now();
            // dd($data);
            $posts = Post::create($data);

            toastr()->success('Đăng thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => PostController@store => " . $exception->getMessage());
            toastr()->error('Đăng thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('createPost');
        }
        return redirect()->route('home');
    }
}
