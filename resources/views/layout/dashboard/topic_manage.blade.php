<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>imgShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/slicknav.min.css') }}">
    <!-- Amcharts CSS -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/responsive.css') }}">
    <!-- Modernizr CSS -->
    <script src="{{ asset('assetsAdmin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    {{-- Style CSS Update --}}
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/update.css') }}">
</head>

<body>
    <!-- Preloader Area - Start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- Preloader Area - End -->
    <!-- Page Container Area - Start -->
    <div class="page-container">
        <!-- Sidebar Menu Area - Start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo dashboard-logo-text">
                    imgShare
                    {{-- <a href="#"><img src="{{ asset('assetsAdmin/images/icon/logo.png') }}" alt="logo"></a> --}}
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="#"><i class="ti-user"></i><span>Quản lý tài khoản</span></a></li>
                            <li class="active"><a href="#"><i class="ti-image"></i> <span>Quản lý bài đăng</span></a></li>
                            <li><a href="#"><i class="ti-folder"></i> <span>Quản lý chủ đề</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu Area - End -->
        <!-- Main Content Area - Start -->
        <div class="main-content">
            <!-- Page Title Area - Start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <div class="nav-btn pull-left" style="margin-top: 3px !important;">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Quản lý</a></li>
                                <li><span>Tài khoản</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('assetsAdmin/images/author/avatar.png') }}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hà Trung Nghĩa<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu dropdown-menu-pf">
                                <a class="dropdown-item" href="#">Cài đặt</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title Area - End -->

            @yield('content')

        </div>
        <!-- Main Content Area - End -->
        <!-- Footer Area - Start-->
        <footer class="footer dashboard-footer">
            <div class="container-fluid footer-signature">
                <p>&copy; Đồ án Website Chia Sẻ Hình Ảnh Tích Hợp DeepLearning - Hà Trung Nghĩa</p>
            </div>
        </footer>
        <!-- Footer Area End-->
    </div>
    <!-- Page Container Area - End -->
    <!-- jQuery Latest Version -->
    <script src="{{ asset('assetsAdmin/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- Bootstrap 4 JS -->
    <script src="{{ asset('assetsAdmin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/jquery.slicknav.min.js') }}"></script>

    <!-- Start Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- Others Plugins -->
    <script src="{{ asset('assetsAdmin/js/plugins.js') }}"></script>
    <script src="{{ asset('assetsAdmin/js/scripts.js') }}"></script>
</body>
</html>
