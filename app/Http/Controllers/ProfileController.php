<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Collection_Post;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $collections = Collection::where('user_id', auth()->user()->id)->get();

        return view('profile.profile', ['posts' => $posts, 'collections'=> $collections]);
    }

    public function showUpdate(){
        return view('profile.update_profile');
    }


}
