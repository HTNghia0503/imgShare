<?php

namespace App\Http\Controllers;

use App\Http\Requests\Collection\CollectionRequest;
use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CollectionController extends Controller
{
    public function createCollection(CollectionRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            $data['created_at'] = Carbon::now();

            $collections = Collection::create($data);

            toastr()->success('Tạo bộ sưu tập mới thành công! Bạn có thể vào tab để xem lại!', 'Thông báo', ['timeOut' => 2000]);

        } catch (\Exception $exception) {
            Log::error("ERROR => CollectionController@createCollection => " . $exception->getMessage());
            toastr()->error('Tạo bộ sưu tập mới thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('profile');
        }
        return redirect()->route('profile');
    }

    public function updateCollection(CollectionRequest $request, $id){
        try {
            $data = $request->all();
            $data['updated_at'] = Carbon::now();

            Collection::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => CollectionController@updateCollection => ". $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('detailCollection', $id);
        }
        return redirect()->route('detailCollection', $id);
    }

    public function deleteCollection(Request $request, $id){
        try {
            $collection = Collection::findOrFail($id);
            if($collection) $collection->delete();

            toastr()->success('Xóa thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            toastr()->error('Xóa thất bại!', 'Thông báo', ['timeOut' => 2000]);
            Log::error("ERROR => CollectionController@deleteCollection => ". $exception->getMessage());
            return redirect()->route('profile');
        }
        return redirect()->route('profile');
    }
}
