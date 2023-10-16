<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile.profile');
    }

    public function showUpdate(){
        return view('profile.update_profile');
    }
}
