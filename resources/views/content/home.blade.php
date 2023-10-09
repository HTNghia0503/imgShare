@extends('layout.home_layout')
@section('content')

    <main class="img-wrapper">
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/1.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/2.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/3.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/4.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/5.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/6.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/7.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/8.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="">
                <img src="{{ asset('img/home-img/9.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="">
                <img src="{{ asset('img/home-img/10.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="#">
                <img src="{{ asset('img/home-img/11.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="">
                <img src="{{ asset('img/home-img/12.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item">
            <a href="">
                <img src="{{ asset('img/home-img/13.jpg') }}" alt="image">
            </a>
        </div>
        <div class="img-item"></div>
    </main>

    <!-- Upload -->
    <!-- Form LogIn - Start -->
    <div class="modal fade" id="uploadModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" data-bs-backdrop="static">
            <div class="modal-content">
                <div class="modal-body modal-body-pd">

                    <div class="d-flex">
                        <div class="col-md-4 dropzone-background">
                            <div id="drop-area" class="drop-area">
                                <div class="drop-content">
                                    <div class="custom-file-upload image-preview">
                                        <input id="file-upload" type="file" accept="image/*">
                                        <label for="file-upload" class="custom-file-label"><i class="fa-solid fa-circle-arrow-up"></i></label>
                                        <!-- <img id="selected-image" src="#" alt=""> -->
                                    </div>
                                    <p>Kéo thả hoặc nhấn vào để chọn hình ảnh</p>
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
                                    <button type="submit">Lưu</button>
                                </div>
                            </div>
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
    </div>
    <!-- Form LogIn - End -->
    <!--  -->

@stop
