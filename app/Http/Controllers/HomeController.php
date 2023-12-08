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

    public function search(Request $request)
    {
        $key = $request->input('key');
        $posts = Post::where('title', 'like', "%$key%")->get();

        return view('content.search', compact('posts', 'key'));
    }

}
