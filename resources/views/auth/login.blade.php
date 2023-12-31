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
    {{-- Liên kết jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

    <div class="container-login">
        <div class="main-bg">
            <div class="illustration-zone">
                <img src="{{ asset('img/d3467cdaaaaa8c62d107c39d72c75e02.jpg') }}" alt="" height="100%" style="border-top-left-radius: 32px;border-bottom-left-radius: 32px;">
                <!-- <div class="text-zone">
                    Cùng nhau tham gia và phát triển cộng đồng đam mê nghệ thuật nào !
                </div> -->
            </div>
            <div class="login-zone">
                <div class="login-zone-bg">
                    <div class="login-logo">
                        <img src="{{ asset('img/imgShare.png') }}" alt="" width="35%" class="d-inline-block align-text-top">
                    </div>
                    <div class="login-welcome">
                        <p>Chào mừng bạn trở lại với</p>
                        <div>imgShare</div>
                    </div>
                    <div>
                        <h5 class="login-form-title" id="loginModalLabel">Đăng nhập</h5>
                    </div>
                    <form id="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="field-email">
                            <label for="emailLogin" class="form-label form-label-login" value="{{ old('email') }}">Email</label>
                            <input type="email" name="email" class="form-control form-control-format" id="emailLogin" >
                            @error('email')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="field-group-ex">
                            <label for="passwordLogin" class="form-label form-label-login">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control form-password" id="passwordLogin" >
                                <button class="btn btn-outline-secondary show-pass" type="button" id="togglePasswordLogin">
                                    <i id="passwordIconLogin" class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                                <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('message'))
                                <div class="" style="color: #dc3545!important; margin-top: 0.25rem; font-size: .875em;">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-submit-login"><b>Đăng nhập</b></button>
                    </form>
                    <p class="goto-signup">Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
<!-- <footer class="footer">
    <div class="container-fluid footer-signature">
        <p>&copy; Đồ án Website Chia Sẻ Hình Ảnh Tích Hợp DeepLearning - Hà Trung Nghĩa</p>
    </div>
</footer> -->

<!-- Thêm liên kết tới tệp JavaScript của Bootstrap 5 và jQuery (nếu cần) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>
