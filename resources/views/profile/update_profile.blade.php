@extends('layout.profile.profile')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="upload-main-area update-frame">
            <div class="update-title">Chỉnh sửa thông tin cá nhân</div>
            <div class="update-warning">Hãy giữ riêng tư thông tin cá nhân của bạn. Thông tin bạn thêm vào đây hiển thị cho bất kỳ ai có thể xem hồ sơ của bạn.</div>
            <div class="update-warning">Cân nhắc trước khi xác nhận thay đổi !</div>
            <div class="update-info-grp">
                <div class="update-avt">
                    <img src="{{ asset('img/profile.jpg') }}" alt="AVT" height="200vh" style="border-radius: 112px;">
                </div>
                <button type="button" class="btn-signup update-btn">Thay đổi</button>
            </div>
            <div class="update-info-user">
                <label for="username" class="col-form-label input-label">Tên người dùng:</label>
                <input type="text" name="username" class="form-control" value="{{ old('username', $contract->customer->name ?? '') }}" id="username">
                @error('username')
                    <small id="" class="form-text text-danger">{{ $errors->first('username') }}</small>
                @enderror
            </div>
            <div class="cfm-update-btn">
                {{-- <button type="button" class="btn-signup">Thiết lập lại</button> --}}
                <button type="button" class="btn-signup btn-save-update">Lưu thay đổi</button>
            </div>
        </div>
    </div>
@stop
