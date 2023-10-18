<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('content.home');
    }
}
