@extends('layout.profile.profile')
@section('content')
    <main class="profile-container">
        <div class="row profile-info">
            <div class="col-4"></div>
            <div class="col-4 profile-info-content">
                <div class="profile-avt">
                    <img src="{{ asset('img/profile.jpg') }}" alt="IMAGEavt">
                </div>
                <div class="profile-username">
                    Hà Trung Nghĩa
                </div>
                <div class="profile-email">
                    nghiaht@gmail.com
                </div>
                <div class="profile-tool">
                    <div class="update-profile">
                        <button id="updateProfile">
                            Chỉnh sửa thông tin
                        </button>
                    </div>
                    <script>
                        const updateBtn = document.getElementById('updateProfile');
                        updateBtn.addEventListener('click', function() {
                            window.location.href = "{{ route('update') }}";
                        });
                    </script>
                    <ul>
                        <li>
                            <button id="collectionLink" class="profile-tool-add" type="button">
                                Tạo bảng lưu
                            </button>
                        </li>
                        <li>
                            <button class="profile-tool-sort">
                                Sắp xếp bảng
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="profile-tabs">
            <button class="tablinks active" onclick="openTab(event, 'created')">Đã tạo</button>
            <button class="tablinks" onclick="openTab(event, 'saved')">Đã lưu</button>
        </div>

        <!-- Nội dung của tab "Đã tạo" -->
        <div id="created" class="tabcontent">
            <div class="d-flex manage-collections">
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/2.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Gia đình
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/3.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Động vật
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/4.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Thực vật
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/5.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Kiến trúc
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/6.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/7.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/8.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/9.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/10.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/11.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/12.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item-last"></div>
            </div>
        </div>

        <!-- Nội dung của tab "Đã lưu" -->
        <div id="saved" class="tabcontent">
            <div class="d-flex manage-collections">
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Gia đình
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Động vật
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Thực vật
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Kiến trúc
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item">
                    <a href="#">
                        <div class="collection-avt">
                            <img src="{{ asset('img/home-img/1.jpg') }}" width="100%" alt="IMAGE">
                        </div>
                        <div class="collection-title-des">
                            Phong cảnh
                        </div>
                    </a>
                </div>
                <div class="collection-item-last"></div>
            </div>
        </div>

        <!-- <div class="manage-collections">

        </div> -->
    </main>

    <!-- Modal Tạo bảng lưu - Start -->
    <div class="modal fade" id="collectionModal">
        <div class="modal-dialog modal-dialog-centered" data-bs-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <h5 class="modal-title" id="collectionModalLabel">Tạo bảng lưu</h5>
                    </div>

                    <!-- Form bảng lưu - Start -->
                    <form id="collection">
                        <div class="mb-3">
                            <label for="collectionName" class="form-label form-label-format">Tên bảng lưu</label>
                            <input type="text" class="form-control form-control-format" id="collectionName" required>
                        </div>
                        <div>
                            <label for="collectionDesc" class="form-label form-label-format">Mô tả bảng lưu</label><br>
                            <!-- <input type="text" class="form-control form-control-format form-control-last" id="collectionDesc" required> -->
                            <textarea class="collection-description" name="" id="" cols="45" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit-login"><b>Khởi tạo</b></button>
                    </form>
                    <!-- Form bảng lưu - End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tạo bảng lưu - End -->

@stop
