@extends('layout.post.post_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="d-flex detail-info-bg">
            <div class="img-frame" style="max-width: 70%; min-width: 30%">
                <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="Full Image" width="100%" height="100%" style="object-fit: cover; border-radius: 8px;">
            </div>
            <div class="d-flex info-frame" style="min-width: 30%; max-width: 70%">
                <div class="info-frame-top">

                    {{-- Form Save Post -> Collection --}}
                    <form action="{{ route('savePost') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="d-flex save-to-collection">
                            <label for="pickCollectionSave">Chọn bộ sưu tập</label>

                            @php
                                $selectedCollectionId = !empty($_COOKIE['selectedCollectionId']) ? $_COOKIE['selectedCollectionId'] : null;
                            @endphp

                            <select name="collection_id" id="pickCollectionSave">
                                @if ($post->user_id !== Auth::user()->id)
                                    @foreach ($collections as $collection)
                                        <option value="{{ $collection->id }}" {{ $collection->id == $selectedCollectionId ? 'selected' : '' }}>
                                            {{ $collection->title }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($collections as $collection)
                                        @if ($post->collection->contains($collection))
                                            <option value="{{ $collection->id }}" selected>{{ $collection->title }}</option>
                                        @else
                                            <option disabled value="{{ $collection->id }}">{{ $collection->title }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>

                            @if ($post->user_id !== Auth::user()->id) <!-- Kiểm tra xem bài đăng không phải của người dùng hiện tại -->

                                <button id="save-button-post" type="submit" data-saved="0">Lưu</button>

                            @else
                                <button type="button" class="disabled" disabled>Lưu</button>
                            @endif
                        </div>
                    </form>

                    {{-- <script>
                        // Lấy giá trị đã chọn từ localStorage
                        var selectedCollectionId = localStorage.getItem('selectedCollectionId');
                        var select = document.getElementById('pickCollectionSave');

                        // Kiểm tra xem có giá trị đã lưu trong localStorage không
                        if (selectedCollectionId) {
                            // Khôi phục giá trị đã chọn từ localStorage
                            select.value = selectedCollectionId;
                        }

                        // Lưu giá trị đã chọn vào localStorage khi thay đổi
                        select.addEventListener('change', function() {
                            selectedCollectionId = select.value;
                            localStorage.setItem('selectedCollectionId', selectedCollectionId);
                        });
                    </script> --}}


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
