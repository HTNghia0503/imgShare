<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('content.home', ['posts' => $posts]);
    }

    public function detailPost($postId) {

        $post = Post::find($postId);
        $collections = Collection::where('user_id', auth()->user()->id)->get(); // Xác định các Collections thuộc sở hữu của người đang Đăng nhập

        return view('post.detail', ['post' => $post, 'collections' => $collections]);
    }

}
