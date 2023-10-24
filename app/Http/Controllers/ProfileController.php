<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\Collection;
use App\Models\Collection_Post;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $collections = Collection::where('user_id', auth()->user()->id)->get();

        return view('profile.profile', ['posts' => $posts, 'collections'=> $collections, 'user'=> $user]);
    }

    public function showUpdate($id){
        $user = auth()->user();

        return view('profile.update', ['user'=> $user]);
    }

    public function update(UserRequest $request, $id){
        try {
            $data = $request->all();

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('img/avt-user/'), $avatarName);
                $data['avatar'] = $avatarName;
            }

            $data['updated_at'] = Carbon::now();

            User::find($id)->update($data);

            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => ProfileController@update => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('update', $id);
        }
        return redirect()->route('profile');
    }

}
