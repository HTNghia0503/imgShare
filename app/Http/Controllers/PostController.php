<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        $collections = Collection::where('user_id', auth()->user()->id)->get(); // Xác định các Collections thuộc sở hữu của người đang Đăng nhập
        $topics = Topic::all();

        return view('post.create', ['collections' => $collections, 'users' => $users, 'topics' => $topics]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $data['created_at'] = Carbon::now();
            $image = $request->file('img_path');

            // Lưu trữ tệp ảnh vào thư mục public/img/home-img
            $path = $image->store('', 'home_img');

            $data['img_path'] = $path;
            $posts = Post::create($data);

            $topic_title = $request->input('topic-title');

            // Tìm chủ đề với title tương ứng
            $topic = Topic::where('title', $topic_title)->first();
            $topicId = $topic->id;

            $collectionId = $request->input('collection');

            // Gán bài đăng vào bộ sưu tập thông qua mối quan hệ
            $posts->collection()->attach($collectionId);

            // Gán hình ảnh vào chủ đề
            $posts->topic()->attach($topicId);

            toastr()->success('Đăng thành công!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => PostController@store => " . $exception->getMessage());
            toastr()->error('Đăng thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('createPost');
        }
        return redirect()->route('home');
    }

    public function detailPost($postId) {

        $post = Post::find($postId);
        $collections = Collection::where('user_id', auth()->user()->id)->get(); // Xác định các Collections thuộc sở hữu của người đang Đăng nhập
        $user = Auth::user();
        $defaultCollection = $post->collection->first(); // Lấy phần tử đầu tiên trong collection
        $defaultCollectionId = $defaultCollection ? $defaultCollection->id : null; // Lấy ID nếu tồn tại, nếu không tồn tại thì gán null

        $collection_contain = $post->collection;

        $comments = Comment::where('post_id', $postId)->get(); // Lấy tất cả các comment có post_id trùng với post_id đang xem

        $topic = $post->topic->first();

        // Tìm các post tương tự
        $similarPosts = $topic->post()
                        ->where('posts.id', '!=', $postId) // Trừ post đang xem ra
                        ->get();

        return view('post.detail', [
            'post' => $post,
            'collections' => $collections,
            'user'=> $user,
            'comments'=> $comments,
            'defaultCollectionId' => $defaultCollectionId,
            'defaultCollection' => $defaultCollection,
            'collection_contain'=> $collection_contain,
            'topic' => $topic,
            'similarPosts' => $similarPosts,
        ]);
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

    public function updatePost(PostRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_at'] = Carbon::now();

            $post = Post::find($id);
            $collectionId = $data['collection_id'];

            // Xóa tất cả các bản ghi trong bảng pivot collection_post cho bài đăng này
            $post->collections()->detach();

            // Nếu collectionId khác null, thêm bản ghi mới vào bảng pivot
            if (!is_null($collectionId)) {
                $post->collections()->attach($collectionId);
            }

            Post::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => PostController@updatePost => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('detailPost', $id);
        }
        return redirect()->route('detailPost', $id);
    }

    public function deletePost(Request $request, $id){
        try {
            $post = Post::findOrFail($id);
            if($post) $post->delete();

            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => PostController@deletePost => ". $exception->getMessage());
            return redirect()->route('home');
        }
        return redirect()->route('home');
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

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $post_id = $post->id;
        $user = Auth::user();
        $comments = $request->input('comment');
        $created_at = Carbon::now();

        $user->comment()->attach($post_id, ['comment' => $comments, 'created_at' => $created_at]);

        return redirect()->route('detailPost', ['postId' => $post_id]);
    }

}
