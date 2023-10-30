@extends('layout.profile.profile')
@section('content')
    <main class="profile-container">
        <div class="profile-info">
            <div class="profile-info-content">
                <div class="profile-avt">
                    <img src="{{ asset('img/avt-user/' . Auth::user()->avatar)}}" alt="Avatar" width="200px" height="200px" style="object-fit: cover; border-radius: 50%;">
                </div>
                <div class="profile-username">{{ Auth::user()->name }}</div>
                <div class="profile-email">{{ Auth::user()->email }}</div>
                <div class="profile-tool">
                    <div class="update-profile">
                        <button id="updateProfile">
                            Chỉnh sửa thông tin
                        </button>
                    </div>

                    {{-- Xử lý điều hướng đến trang Update của nút updateProfile --}}
                    <script>
                        const updateBtn = document.getElementById('updateProfile');
                        updateBtn.addEventListener('click', function() {
                            window.location.href = "{{ route('update', ['id' => $user->id]) }}";
                        });
                    </script>
                    {{-- End --}}
                    <div class="create-collection">
                        <button id="collectionLink" class="profile-tool-add" type="button">
                            Tạo bộ sưu tập
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-tabs">
            <button class="tablinks active" onclick="openTab(event, 'created')">Bài đăng cá nhân</button>
            <button class="tablinks" onclick="openTab(event, 'saved')">Bộ sưu tập</button>
        </div>

        <!-- Nội dung của tab "Bài đăng cá nhân" -->
        <div id="created" class="tabcontent">
            <div class="d-flex manage-collections">
                @foreach ($posts as $post)
                    <div class="personal-post">
                        <a href="{{ route('detailPost', ['postId' => $post->id]) }}">
                            <div class="personal-post-img">
                                <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="image" width="330px" height="210px" style="border-radius: 16px; object-fit: cover;">
                            </div>
                            <div class="personal-post-title">{{ $post->title }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="collection-item-last"></div>
            </div>
        </div>

        <!-- Nội dung của tab "Bộ sưu tập" -->
        <div id="saved" class="tabcontent">
            <div class="d-flex manage-collections">
                @foreach ($collections as $collection)
                    <div class="collection-item">
                        <a href="{{ route('detailCollection', ['collectionId' => $collection->id]) }}">
                            <div class="d-flex collection-avt">
                                @if ($collection->post->count() > 0)
                                    @if ($collection->post->count() === 1)
                                        <div class="img-main-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[0]->img_path) }}" width="100%" alt="Collection Image" class="main-avt">
                                        </div>
                                        <div class="d-flex img-sub-avt">
                                            <div class="grey-frame-top"></div>
                                            <div class="grey-frame"></div>
                                        </div>
                                    @elseif ($collection->post->count() === 2)
                                        <div class="img-main-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[0]->img_path) }}" width="100%" alt="Collection Image" class="main-avt">
                                        </div>
                                        <div class="d-flex img-sub-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[1]->img_path) }}" width="100%" alt="Collection Image" class="sub-avt">
                                            <div class="grey-frame"></div>
                                        </div>
                                    @else
                                        <div class="img-main-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[0]->img_path) }}" width="100%" alt="Collection Image" class="main-avt">
                                        </div>
                                        <div class="d-flex img-sub-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[1]->img_path) }}" width="100%" alt="Collection Image" class="sub-avt">
                                            <img src="{{ asset('img/home-img/' . $collection->post[2]->img_path) }}" width="100%" alt="Collection Image" class="sub-avt-bot">
                                        </div>
                                    @endif
                                @else
                                    <img src="{{ asset('img/No_image_available.png') }}" width="100%" alt="Default Image" style="object-fit: cover; border-radius: 16px;">
                                @endif
                            </div>
                            <div class="collection-title-des">{{ $collection->title }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="collection-item-last"></div>
            </div>
        </div>

        <!-- <div class="manage-collections">

        </div> -->
    </main>

    <!-- Modal Tạo bộ sưu tập - Start -->
    <div class="modal fade" id="createCollectionModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-collection">
                    <div>
                        <h5 class="modal-title modal-title-collection" id="collectionModalLabel">Tạo bộ sưu tập</h5>
                    </div>
                    <!-- Form bộ sưu tập - Start -->
                    <form id="createCollectionForm" method="POST" action="{{ route('createCollection') }}">
                        @csrf
                        <div class="mb-2">
                            <label for="collectionName" class="form-label form-label-format">Tên bộ sưu tập</label>
                            <input type="text" name="title" class="form-control form-control-format" id="collectionName" required>
                        </div>
                        @error('title')
                            <small id="" class="form-text text-danger">{{ $errors->first('title') }}</small>
                        @enderror
                        <p class="collection-note">Bạn nên đặt tên bộ sưu tập là cụm từ đại diện dễ nhớ, dễ hiểu nhé !</p>
                        <button type="submit" id="createCollectionBtn" class="btn btn-primary btn-submit-login btn-collection"><b>Khởi tạo</b></button>
                    </form>
                    <!-- Form bộ sưu tập - End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tạo bộ sưu tập - End -->

@stop
