<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    // Tạo bộ sưu tập mới
    public function createCollection(Request $request)
    {
        $collection = new Collection();
        $collection->user_id = Auth::user()->id; // Lấy ID của người đăng nhập
        $collection->title = $request->input('collectionName');
        $collection->save();
        dd($collection);
        return response()->json(['success' => true]);
    }

    // Lấy danh sách bộ sưu tập
    public function getCollections()
    {
        $collections = Collection::where('user_id', Auth::user()->id)->get();

        return response()->json(['success' => true, 'collections' => $collections]);
    }

}
