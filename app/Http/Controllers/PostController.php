<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
            $image = $request->file('img_path');
            // Lưu trữ tệp ảnh vào thư mục public/img/home-img
            $path = $image->store('', 'home_img');

            // Lưu đường dẫn của tệp vào cơ sở dữ liệu
            $data['img_path'] = $path;
            $posts = Post::create($data);

            // Lấy giá trị collection_id từ request
            $collectionId = $request->input('collection');

            // Gán bài đăng vào bộ sưu tập thông qua mối quan hệ
            $posts->collection()->attach($collectionId);
            // dd($posts);

            toastr()->success('Đăng thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => PostController@store => " . $exception->getMessage());
            toastr()->error('Đăng thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('createPost');
        }
        return redirect()->route('home');
    }

    public function detail()
    {
        return view('post.detail');
    }

    public function savePost(Request $request)
    {
        $post_id = $request->input('post_id');
        $collection_id = $request->input('collection_id');
        $post = Post::find($post_id);
        $collection = Collection::find($collection_id);

        if ($post && $collection) {
            // Kiểm tra xem liên kết đã tồn tại hay chưa
            if (!$collection->post->contains($post_id)) {
                $collection->post()->attach($post_id);
            } else {
                // dd($collection->post->contains($post_id));
                $collection->post()->detach($post_id);
            }
        }

        return redirect()->route('detailPost', ['postId' => $post_id]);
    }

    public function likePost(Request $request)
    {
        $post_id = $request->input('post_id');
        $user = Auth::user();

        // Kiểm tra xem người dùng đã like bài viết này chưa
        $liked = $user->like->contains($post_id);

        if ($liked) {
            // Nếu đã like, hủy like và giảm likequantity
            $user->like()->detach($post_id);
            $post = Post::find($post_id);
            $post->decrement('likequantity');
        } else {
            // Nếu chưa like, thêm like và tăng likequantity
            $user->like()->attach($post_id);
            $post = Post::find($post_id);
            $post->increment('likequantity');
        }

        return response()->json(['liked' => !$liked, 'likequantity' => $post->likequantity]);
    }

}
