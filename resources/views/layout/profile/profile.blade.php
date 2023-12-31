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
    {{-- <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet"> --}}
    <!-- Link tới tệp CSS tùy chỉnh thêm của bản thân -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Liên kết đến Font Awesome qua CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid d-flex">
                <div class="home-logo">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/imgShare.png') }}" alt="logo" width="80px">
                    </a>
                </div>
                <div class="home-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item home-nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item home-nav-item">
                            <a class="nav-link" href="{{ route('createPost') }}">Đăng tải</a>
                        </li>
                    </ul>
                </div>
                <div class="home-search flex-grow-1">
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2 home-search-bar" name="key" type="text" placeholder="&#xF002;  Nhập từ khóa tìm kiếm" style="font-family:Arial, FontAwesome" aria-label="Search">
                        {{-- <button type="submit">Tìm kiếm</button> --}}
                    </form>
                </div>
                <div class="home-profile">
                    @if (Auth::check())
                        <div class="dropdown">
                            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/avt-user/' . Auth::user()->avatar) }}" alt="Avatar" height="56px" width="56px" style="border-radius: 50%; object-fit: cover;">
                            </a>
                            <ul class="dropdown-menu profile-dropdown" aria-labelledby="profile-dropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Quản lý hồ sơ</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
          </nav>
    </header>

    @yield('content')

    <!-- Footer -->
    {{-- <footer class="footer">
        <div class="container-fluid footer-signature">
            <p>&copy; Đồ án Website Chia Sẻ Hình Ảnh Tích Hợp DeepLearning - Hà Trung Nghĩa</p>
        </div>
    </footer> --}}

    <!-- Thêm liên kết tới tệp JavaScript của Bootstrap 5 và jQuery (nếu cần) -->
    {{-- <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
