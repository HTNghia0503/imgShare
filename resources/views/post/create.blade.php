@extends('layout.post.post_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="upload-main-area">
            <div class="">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex post-container">
                        <div class="dropzone-background" style="min-width: 35%; max-width: 70%;">
                            <div id="drop-area" class="drop-area">
                                <div class="drop-content">
                                    <div class="custom-file-upload image-preview">
                                        <label for="img-upload" class="custom-file-label"><i class="fa-solid fa-circle-arrow-up"></i></label>
                                    </div>
                                    <p>Kéo thả hoặc nhấn vào <br> để chọn hình ảnh</p>
                                </div>
                                <img id="selected-image-review" src="#" alt="Image" width="100%" height="100%" style="object-fit: cover; border-radius: 8px;">
                                <input id="img-upload" type="file" name="img_path" accept="image/*">
                            </div>
                        </div>
                        <div class="create-info" style="min-width: 30%; max-width: 70%;">
                            <div class="d-flex save-to-collection stc-create">
                                <label class="col-md-4" for="pickCollection">Chọn bộ sưu tập</label>
                                <div class="btn-group-save">
                                    <select name="collection" id="pickCollection" class="create-select">
                                        @foreach ($collections as $collection)
                                            <option value="{{ $collection->id }}">{{ $collection->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="upload-title-post">
                                <input type="text" name="title" placeholder="Tiêu đề">
                            </div>
                            <div class="separate"></div>
                            <div class="upload-description-post mt-5">
                                <textarea name="description" cols="50" rows="5" placeholder="Viết mô tả cho bài đăng của bạn"></textarea>
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

    <script>
        $(document).ready(function () {
            // Bắt sự kiện khi người dùng chọn tệp ảnh
            $('#img-upload').on('change', function () {
                // Hiển thị tệp ảnh được chọn lên giao diện
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#selected-image-review').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@stop
