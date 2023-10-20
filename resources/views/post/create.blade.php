@extends('layout.post.post_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="upload-main-area">
            <div class="">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex">
                        <div class="col-md-4 dropzone-background">
                            <div id="drop-area" class="drop-area">
                                <div class="drop-content">
                                    <div class="custom-file-upload image-preview">
                                        <input id="file-upload" type="file" name="img_path" accept="image/*">
                                        <label for="file-upload" class="custom-file-label"><i class="fa-solid fa-circle-arrow-up"></i></label>
                                        <!-- <img id="selected-image" src="#" alt=""> -->
                                    </div>
                                    <p>Kéo thả hoặc nhấn vào <br> để chọn hình ảnh</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <div class="d-flex save-to-collection stc-create">
                                <label class="col-md-4" for="pickCollection">Chọn bộ sưu tập</label>
                                <div class="btn-group-save">
                                    <select name="collection" id="pickCollection">
                                        @foreach ($collections as $collection)
                                            <option value="{{ $collection->id }}">{{ $collection->title }}</option>
                                        @endforeach
                                        <option value="create-new-collection" class="create-collection-option" data-toggle="modal" data-target="#createCollectionModal">Tạo bộ sưu tập mới</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Xử lý khi chọn "Tạo bộ sưu tập mới" --}}
                            <script>
                                $(document).ready(function () {
                                    $('#pickCollection').change(function () {
                                        if ($(this).val() === 'create-new-collection') {
                                            $('#createCollectionModal').modal('show');
                                        }
                                    });
                                });
                            </script>
                            {{-- End --}}
                            <div class="upload-title-post">
                                <input type="text" name="title" placeholder="Tiêu đề">
                            </div>
                            <div class="separate"></div>
                            <div class="upload-description-post mt-5">
                                <textarea name="description" cols="64" rows="10" placeholder="Viết mô tả cho bài đăng của bạn"></textarea>
                            </div>
                            <div class="separate"></div>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> <!-- Trường ẩn để lấy giá trị user_id -->
                            <div class="upload-btn">
                                <button type="submit">Đăng tải</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
