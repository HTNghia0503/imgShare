@extends('layout.home.upload_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="upload-main-area">
            <div class="">
                <div class="d-flex">
                    <div class="col-md-4 dropzone-background">
                        <div id="drop-area" class="drop-area">
                            <div class="drop-content">
                                <div class="custom-file-upload image-preview">
                                    <input id="file-upload" type="file" accept="image/*">
                                    <label for="file-upload" class="custom-file-label"><i class="fa-solid fa-circle-arrow-up"></i></label>
                                    <!-- <img id="selected-image" src="#" alt=""> -->
                                </div>
                                <p>Kéo thả hoặc nhấn vào <br> để chọn hình ảnh</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="d-flex save-to-collection">
                            <label class="col-md-4" for="pickCollection">Chọn bộ sưu tập</label>
                            <div class="col-md-8 btn-group-save">
                                <select name="" id="pickCollection">
                                    <option value="">Phong cảnh</option>
                                    <option value="">Kiến trúc</option>
                                    <option value="">Hoạt hình</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="uploader-info">
                            @if(Auth::check())
                                <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="user-avatar">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                            @endif
                        </div> --}}
                        <div class="upload-title-post">
                            <input type="text" name="title-post" id="" placeholder="Tiêu đề">
                        </div>
                        <div class="separate"></div>
                        <div class="upload-description-post mt-5">
                            <textarea name="" id="" cols="55" rows="10" placeholder="Viết mô tả cho bài đăng của bạn"></textarea>
                        </div>
                        <div class="separate"></div>
                        <div class="upload-btn">
                            <button type="submit">Đăng tải</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
