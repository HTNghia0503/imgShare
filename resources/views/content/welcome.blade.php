@extends('layout.welcome_layout')
@section('content')

    <!-- Form LogIn - Start -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered" data-bs-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-logo">
                        <img src="{{ asset('img/imgShare.png') }}" alt="" width="35%" class="d-inline-block align-text-top">
                    </div>
                    <div class="login-welcome">
                        <p>Chào mừng bạn trở lại với</p>
                        <div>imgShare</div>
                    </div>
                    <div>
                        <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                    </div>

                    <!-- Form đăng nhập -->
                    <form id="login">
                        <div class="mb-3">
                            <label for="emailLogin" class="form-label form-label-format">Email</label>
                            <input type="email" class="form-control form-control-format" id="emailLogin" required>
                        </div>
                        <div>
                            <label for="passwordLogin" class="form-label form-label-format">Mật khẩu</label>
                            {{-- <input type="password" class="form-control form-control-format form-control-last" id="passwordLogin" required> --}}
                            <div class="input-group">
                                <input type="password" class="form-control form-password" id="passwordLogin" required>
                                <button class="btn btn-outline-secondary show-pass" type="button" id="togglePasswordLogin">
                                    <i id="passwordIconLogin" class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <a href="#" class="forgot-password">Quên mật khẩu?</a> --}}
                        <button type="submit" class="btn btn-primary btn-submit-login"><b>Đăng nhập</b></button>
                        <p class="goto-signup">Bạn chưa có tài khoản? <a href="#modalSignup">Đăng ký</a></p>
                    </form>
                    <!-- End Form đăng nhập -->

                </div>
            </div>
        </div>
    </div>
    <!-- Form LogIn - End -->

    <!-- Form SignUp - Start -->
    <div class="modal fade" id="signupModal">
        <div class="modal-dialog modal-dialog-centered" data-bs-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="signup-logo">
                        <img src="{{ asset('img/imgShare.png') }}" alt="" width="35%" class="d-inline-block align-text-top">
                    </div>
                    <div class="signup-welcome">
                        <p>Chào mừng bạn đến với</p>
                        <div>imgShare</div>
                    </div>
                    <div>
                        <h5 class="modal-title" id="signupModalLabel">Đăng ký</h5>
                    </div>

                    <!-- Form đăng ký -->
                    <form id="signup">
                        <div class="mb-3">
                            <label for="name" class="form-label form-label-format">Tên người dùng</label>
                            <input type="text" class="form-control form-control-format" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailSignUp" class="form-label form-label-format">Email</label>
                            <input type="email" class="form-control form-control-format" id="emailSignUp" required>
                        </div>
                        <div>
                            <label for="passwordSignUp" class="form-label form-label-format">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-password" id="passwordSignUp" required>
                                <button class="btn btn-outline-secondary show-pass" type="button" id="togglePassword">
                                    <i id="passwordIcon" class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit-signup"><b>Đăng ký</b></button>
                        <p class="goto-login">Bạn đã có tài khoản? <a href="#">Đăng nhập</a></p>
                    </form>
                    <!-- End Form đăng ký -->

                </div>
            </div>
        </div>
    </div>

    <!-- Form SignUp - End -->

@stop
