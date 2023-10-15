<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imgShare</title>
    <!-- Link favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Link tới tệp CSS của Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link tới tệp CSS tùy chỉnh thêm của bản thân -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Liên kết đến Font Awesome qua CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid header-margin">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/imgShareText.png') }}" alt="" width="60%" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-space" href="#"><p class="nav-text">Giới thiệu</p></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-space" href="#"><p class="nav-text">Liên hệ</p></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-space" href="{{ route('login') }}"><p class="nav-text">Đăng nhập</p></a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link nav-link-space btn-signup" type="button" id="signupLink">Đăng ký</button>
                    </li>
                </ul>
            </div>
        </nav>

        <script>
            // Lấy nút đăng ký bằng ID
            const signupButton = document.getElementById('signupLink');

            // Thêm sự kiện click cho nút đăng ký
            signupButton.addEventListener('click', function() {
                // Điều hướng đến trang đăng ký
                window.location.href = "{{ route('signup') }}";
            });
        </script>

        <div class="row container-fluid">
            <div class="text-illustration col">
                <div class="text-title">
                    <p>Chào mừng bạn đến với imgShare !</p>
                </div>
                <div class="text-description">
                    <p>Hân hạnh giới thiệu imgShare đến bạn, nơi bạn có thể chia sẻ và tìm kiếm những hình ảnh tuyệt vời từ kho tàng ảnh rộng lớn.</p>
                    <p>Với imgShare, bạn sẽ có cơ hội kết nối với những con người có tâm hồn nghệ thuật đồng điệu với bạn, cùng chia sẻ và lưu giữ những khoảng khắc đáng nhớ của bạn.</p>
                    <p>Cùng tham gia và bắt đầu chia sẻ đam mê nghệ thuật của bạn. Tham gia nhé !</p>
                    <button type="button" class="btn-signup btn-signup-cnt" id="signupNowLink">
                        <span class="text-des-signup">Đăng ký ngay</span> <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="slider image-illustration col">
                <div class="bg-image">
                    <img src="{{ asset('img/services1.png') }}" width="100%" alt="Image">
                </div>
            </div>
        </div>
    </header>

    {{-- <div style="width: 100%; height: 50px;"></div> --}}
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid footer-signature">
            <p>&copy; Đồ án Website Chia Sẻ Hình Ảnh Tích Hợp DeepLearning - Hà Trung Nghĩa</p>
        </div>
    </footer>

    <!-- Thêm liên kết tới tệp JavaScript của Bootstrap 5 và jQuery (nếu cần) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>
