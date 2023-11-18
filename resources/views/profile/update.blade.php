@extends('layout.profile.profile')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="upload-main-area update-frame shadow">
            <div class="update-title">Chỉnh sửa thông tin cá nhân</div>
            <div class="update-warning">Thông tin bạn thêm vào đây hiển thị cho bất kỳ ai có thể xem hồ sơ của bạn. Cân nhắc trước khi thực hiện các thay đổi !</div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="update-info-grp">
                    <div class="update-avt">
                        <input type="file" name="avatar" id="avatar" style="display: none;">
                        <img src="{{ asset('img/avt-user/' . Auth::user()->avatar) }}" alt="AVT" height="200px" width="200px" style="object-fit: cover; border-radius: 50%;" id="avatar-preview">
                        <div class="btn-update-avt" style="text-align: center">
                            <label for="avatar" class="update-btn">Thay đổi</label>
                        </div>
                    </div>
                </div>
                <div class="update-info-user">
                    <label for="user_name" class="col-form-label input-label">Tên người dùng:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" id="user_name">
                    @error('name')
                        <small id="" class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @enderror
                </div>
                <div class="cfm-update-btn">
                    <button type="submit" class="btn-signup btn-save-update">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // Bắt sự kiện khi người dùng chọn tệp ảnh
            $('#avatar').on('change', function () {
                // Hiển thị tệp ảnh được chọn lên giao diện
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#avatar-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@stop
