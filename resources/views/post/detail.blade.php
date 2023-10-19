@extends('layout.post.post_layout')
@section('content')
    <div class="d-flex upload-main-bg">
        <div class="d-flex detail-info-bg">
            <div class="img-frame" style="max-width: 70%; min-width: 30%">
                {{-- <a href="{{ route('viewFullImage', ['postId' => $posts->id]) }}" target="_blank"> --}}
                    <img src="{{ asset('img/home-img/1.jpg') }}" alt="Full Image" width="100%" height="100%" style="object-fit: cover; border-radius: 8px;">
                {{-- </a> --}}
            </div>
            <div class="d-flex info-frame" style="min-width: 30%; max-width: 70%">
                <div class="info-frame-top">
                    <div class="d-flex save-to-collection">
                        <label for="">Chọn bộ sưu tập</label>
                        <select name="" id="">
                            <option value="">Phong cảnh</option>
                            <option value="">Động vật</option>
                            <option value="">Thực vật</option>
                        </select>
                        <button>Lưu</button>
                    </div>
                    <div class="uploader-info">
                        <div class="uploader-avt">
                            <img src="{{ asset('img/profile.jpg') }}" alt="Avatar" width="70px">
                        </div>
                        <div class="uploader-name">Hà Trung Nghĩa</div>
                    </div>
                    <div class="post-comment">
                        <label for="">Nhận xét</label>
                    </div>
                </div>
                <div class="comment-area">
                    Chưa có nhận xét nào! Bạn có nhận xét gì về bài đăng, hãy để lại nhận xét để cùng thảo luận nào!
                </div>
                <div class="interactive-area">
                    <div class="d-flex like-area">
                        <label for="">Bạn thích ảnh này chứ ?</label>
                        <div class="like-btn">
                            <span class="like-count">0</span>
                            <button class="like-button"><i class="fa-regular fa-heart"></i></button>
                            {{-- <i class="fa-solid fa-heart"></i> Active --}}
                        </div>
                    </div>
                    <div class="d-flex user-comment">
                        <div class="user-avt">
                            <img src="{{ asset('img/profile.jpg') }}" alt="Avatar" width="50px">
                        </div>
                        <div class="comment-box" id="comment-box">
                            <input type="text" id="comment-input" placeholder="Bạn nghĩ gì...">
                            <button id="confirm-button"><i class="fa-solid fa-angles-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@stop
