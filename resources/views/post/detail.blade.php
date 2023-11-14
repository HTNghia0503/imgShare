@extends('layout.post.post_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="d-flex shadow detail-info-bg">
            <div class="img-frame" style="max-width: 68%; min-width: 30%">
                <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="Full Image" width="100%" height="100%" style="object-fit: cover; border-radius: 8px;">
            </div>
            <div class="d-flex info-frame" style="min-width: 32%; max-width: 70%">
                <div class="info-frame-top">

                    {{-- Form Save Post -> Collection --}}
                    <form action="{{ route('savePost') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="d-flex save-to-collection">
                            <div class="dropdown dropdown-post">
                                <a href="#" id="tools-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i>
                                </a>
                                <ul class="dropdown-menu tools-dropdown" aria-labelledby="tools-dropdown">
                                    <li><a class="dropdown-item" href="#">Tìm kiếm các ảnh tương tự</a></li>
                                    @if (Auth::check() && $post->user_id == Auth::user()->id)
                                        <li><a class="dropdown-item" href="#" id="updatePostLink">Chỉnh sửa bài đăng</a></li>
                                        <li><a class="dropdown-item delete-post" data-id="{{ $post->id }}" href="#">Xóa bài đăng</a></li>
                                    @endif
                                </ul>
                            </div>

                            @php
                                $selectedCollectionId = !empty($_COOKIE['selectedCollectionId']) ? $_COOKIE['selectedCollectionId'] : null;
                                $saved = false;
                            @endphp

                            @if ($post->user_id === Auth::user()->id)
                                <select name="collection_id" id="pickCollectionSave">
                                    @foreach ($collections as $collection)
                                        @if ($post->collection->contains($collection))
                                            <option value="{{ $collection->id }}" selected>{{ $collection->title }}</option>
                                        @else
                                            <option disabled value="{{ $collection->id }}">{{ $collection->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="button" class="disabled" disabled>Lưu</button>
                            @else
                                <select name="collection_id" id="pickCollectionSave">
                                    @foreach ($collections as $collection)
                                        <option value="{{ $collection->id }}" {{ $collection->id == $selectedCollectionId ? 'selected' : '' }}>
                                            {{ $collection->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @foreach ($collections as $collection)
                                    @foreach ($collection_contain as $item)
                                        @if($item->id === $collection->id)
                                            @php
                                                $saved = true;
                                                break;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                @if ($saved)
                                    <button id="save-button-post" type="submit">Đã Lưu</button>
                                @else
                                    <button id="save-button-post" type="submit">Lưu</button>
                                @endif
                            @endif
                        </div>
                    </form>
                    {{-- End Form Save Post --}}

                    <div class="title-and-description">
                        <div class="detail-post-title">
                            {{ $post->title }}
                        </div>
                        <div class="detail-post-description">
                            {{ $post->description }}
                        </div>
                    </div>
                    <div class="uploader-info">
                        <div class="uploader-avt">
                            <img src="{{ asset('img/avt-user/' . $post->user->avatar) }}" alt="Avatar" width="60px" height="60px" style="object-fit: cover;">
                        </div>
                        <div class="uploader-name">{{ $post->user->name }}</div>
                    </div>

                    <div class="post-comment">
                        <label>Nhận xét</label>
                    </div>
                </div>

                {{-- Vùng hiển thị comment của post --}}
                <div class="d-flex comment-area">
                    @if ($comments->count() > 0)
                        @foreach ($comments as $comment)
                            <div class="d-flex comment-section">
                                <img src="{{ asset('img/avt-user/' . $comment->user->avatar) }}" alt="Avatar" width="45px" height="45px" style="object-fit: cover; border-radius: 50%;">
                                <div class="d-flex name-and-content">
                                    <a class="user-comment-name" href="#">{{ $comment->user->name }}</a>
                                    <span class="user-comment-content">{{ $comment->comment }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Chưa có nhận xét nào! Bạn có nhận xét gì về bài đăng, hãy để lại nhận xét để cùng thảo luận nào!</p>
                    @endif
                </div>

                <div class="interactive-area">
                    <div class="d-flex like-area">
                        <label>Bạn thích ảnh này chứ ?</label>
                        <div class="like-btn">
                            <span class="like-count">{{ $post->likequantity }}</span>
                            @if ($user->like->contains($post->id))
                                <button class="like-button"><i class="fa-solid fa-heart"></i></button>
                            @else
                                <button class="like-button"><i class="fa-regular fa-heart"></i></button>
                            @endif
                        </div>
                    </div>

                    {{-- Form Comment --}}
                    <form action="{{ route('post.comments.store', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        <div class="d-flex user-comment">
                            <div class="user-avt">
                                <img src="{{ asset('img/avt-user/' . Auth::user()->avatar) }}" alt="Avatar" width="50px" height="50px" style="object-fit: cover;">
                            </div>
                            <div class="comment-box" id="comment-box">
                                <input type="text" name="comment" id="comment-input" placeholder="Bạn nghĩ gì...">
                                <button type="submit" id="confirm-button"><i class="fa-solid fa-angles-right"></i></button>
                            </div>
                        </div>
                    </form>
                    {{-- End Form --}}
                </div>
            </div>
        </div>
    </div>

    @if($similarPosts->count() > 0)
        <div class="recommend-title">Các ảnh tương tự bạn có thể thích</div>

        <main class="img-wrapper">
            @foreach($similarPosts as $item)
            <div class="img-item">
                <a href="{{ route('detailPost', ['postId' => $item->id]) }}">
                    <img src="{{ asset('img/home-img/' . $item->img_path) }}" alt="image">
                </a>
            </div>
            @endforeach
            <div class="img-item"></div>
        </main>
    @endif

    {{-- Modal chỉnh sửa post --}}
    <div class="modal fade" id="updatePostModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-collection">
                    <div>
                        <h5 class="modal-title modal-title-collection" id="updatePostModalLabel">Chỉnh sửa bài đăng cá nhân</h5>
                    </div>
                    <!-- Form bộ sưu tập - Start -->
                    <form id="updatePostForm" method="POST" action="{{ route('updatePost', ['id' => $post->id]) }}">
                        @csrf
                        <div class="mb-2 update-post-att">
                            <label for="post_name" class="form-label form-label-format">Tiêu đề bài đăng</label>
                            <input type="text" name="title" class="form-control form-control-format" value="{{ old('title', $post->title ?? '') }}" id="post_name" required>
                        </div>
                        @error('title')
                            <small id="" class="form-text text-danger">{{ $errors->first('title') }}</small>
                        @enderror
                        <div class="mb-2 mt-3 update-post-att">
                            <label for="post_description" class="form-label form-label-format">Mô tả bài đăng</label>
                            <input type="text" name="description" class="form-control form-control-format" value="{{ old('description', $post->description ?? '') }}" id="post_description" required>
                        </div>
                        @error('description')
                            <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                        @enderror
                        <div class="mb-2 mt-3 update-post-att">
                            <label for="post_collection" class="form-label form-label-format">Thay đổi bộ sưu tập</label>
                            <div class="save-to-collection update-collection-post">
                                <select name="collection_id" class="form-control form-control-format" id="post_collection">
                                    @if ($defaultCollectionId === null)
                                        <option value="" {{ is_null($post->collection_id) ? 'selected' : '' }}>Chọn một bộ sưu tập</option>
                                        @foreach ($collections as $collection)
                                            <option value="{{ $collection->id }}" {{ $collection->id == $post->collection_id ? 'selected' : '' }}>
                                                {{ $collection->title }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="{{ $defaultCollection->id }}" {{ $defaultCollection->id == $post->collection_id ? 'selected' : '' }}>{{ $defaultCollection->title }}</option>
                                        @foreach ($collections as $collection)
                                            @if ($collection->id != $defaultCollectionId)
                                                <option value="{{ $collection->id }}" {{ $collection->id == $post->collection_id ? 'selected' : '' }}>
                                                    {{ $collection->title }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @error('collection_id')
                            <small id="" class="form-text text-danger">{{ $errors->first('collection_id') }}</small>
                        @enderror
                        <button type="submit" id="updatePostBtn" class="btn btn-primary btn-submit-login btn-collection"><b>Lưu thay đổi</b></button>
                    </form>
                    <!-- Form bộ sưu tập - End -->
                </div>
            </div>
        </div>
    </div>
    {{-- Modal end --}}

    {{-- Modal xác nhận Xóa --}}
    <div class="modal fade" id="confirmDeletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-delete">
                <div class="modal-header modal-header-delete">
                    <h5 class="modal-title modal-title-delete" id="updateCollectionModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-collection modal-body-delete-coll">
                    <div class="warning-text">
                        Bạn có chắc chắn muốn xóa bài đăng này?
                    </div>
                <div class="modal-footer">
                    <a href="{{ route('detailPost', ['postId' => $post->id]) }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </a>
                    <a href="{{ route('deletePost', ['id' => $post->id]) }}">
                        <button type="button" class="btn btn-danger" id="confirmDeletePostButton">Xóa</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal end --}}
    <script>
        $(document).ready(function () {
            $('.delete-post').click(function (e) {
                e.preventDefault();
                $('#confirmDeletePostModal').modal('show');
            });
        });
    </script>

    {{-- Xử lý Like --}}
    <script>
        $(document).ready(function () {
            $('.like-button').on('click', function () {
                var post_id = {{ $post->id }};
                var like_button = $(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('likePost') }}',
                    data: { post_id: post_id, _token: '{{ csrf_token() }}' },
                    success: function (data) {
                        if (data.liked) {
                            like_button.html('<i class="fa-solid fa-heart"></i>');
                        } else {
                            like_button.html('<i class="fa-regular fa-heart"></i>');
                        }
                        $('.like-count').text(data.likequantity);
                    }
                });
            });
        });
    </script>
    {{-- End - Like --}}

    {{-- Xử lý focus và blur cho comment input và confirm btn --}}
    <script>
        const input = document.getElementById("comment-input");
        const button = document.getElementById("confirm-button");
        const buttonGroup = document.getElementById("comment-box");

        input.addEventListener("focus", () => {
            input.style.backgroundColor = "#fff";
            buttonGroup.style.backgroundColor = "#fff";
            buttonGroup.style.border = "1px solid #e9e9e9";
        });

        input.addEventListener("blur", () => {
            input.style.backgroundColor = "#e9e9e9";
            buttonGroup.style.backgroundColor = "#e9e9e9";
            buttonGroup.style.border = "none";
        });

        input.addEventListener("input", () => {
            if (input.value.length > 0) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        });
    </script>
    {{-- End - Input Comment --}}
@stop
