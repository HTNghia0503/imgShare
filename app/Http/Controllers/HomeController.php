<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Collection_Post;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('content.home', ['posts' => $posts]);
    }

    public function detailPost($postId) {

        $post = Post::find($postId);
        $collections = Collection::where('user_id', auth()->user()->id)->get(); // Xác định các Collections thuộc sở hữu của người đang Đăng nhập
        $user = Auth::user();
        $defaultCollection = $post->collection->first(); // Lấy phần tử đầu tiên trong collection
        $defaultCollectionId = $defaultCollection ? $defaultCollection->id : null; // Lấy ID nếu tồn tại, nếu không tồn tại thì gán null

        $collection_contain = $post->collection;
        // dd($collection_contain);

        $comments = Comment::where('post_id', $postId)->get(); // Lấy tất cả các comment có post_id trùng với post_id đang xem

        return view('post.detail', ['post' => $post, 'collections' => $collections, 'user'=> $user, 'comments'=> $comments, 'defaultCollectionId' => $defaultCollectionId, 'defaultCollection' => $defaultCollection, 'collection_contain'=> $collection_contain]);
    }

    public function detailCollection($collectionId) {

        $collection = Collection::find($collectionId);
        $posts = Post::all();
        $posts_in = Collection_Post::where('collection_id', $collectionId)->get(); // Lấy tất cả các comment có collection_id trùng với collection_id đang xem

        return view('profile.detail_collection', ['collection' => $collection, 'posts_in'=> $posts_in, 'posts' => $posts]);
    }

}
