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
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="about-title">Giới thiệu về imgShare</div>
    </header>
    <main class="about-content">
        <div class="about-sub-title">1. imgShare là gì ?</div>
        <div class="about-sub-content">
            <div class="about-sub-img" style="text-align: center; margin: 8px 16px 8px 0;">
                <img src="{{ asset('img/imgShareText.png') }}" alt="Image" width="24%">
            </div>
            <p>imgShare là một website chia sẻ hình ảnh đóng vai trò như một công cụ khám phá trực quan để tìm kiếm ý tưởng, cảm hứng, chia sẻ hay chỉ đơn giản là thưởng thức những hình ảnh được cộng đồng người dùng cùng nhau xây dựng và đóng góp với nhau.</p>
            <p>Với đa dạng các loại hình ảnh trên imgShare, bạn sẽ luôn tìm thấy ý tưởng để khơi nguồn cảm hứng. Khi bạn bắt gặp hoặc tìm kiếm thấy các hình ảnh mình yêu thích, hãy lưu chúng vào bộ sưu tập để giữ cho các ý tưởng của bạn được sắp xếp và dễ tìm. Bạn cũng có thể tạo những bài đăng để chia sẻ hình ảnh của cá nhân đến với cộng đồng những người yêu thích nghệ thuật khác trên imgShare.</p>
            <p>Bạn hãy thỏa mình vào không gian nghệ thuật cùng với mọi người và tương tác lịch sự với cộng đồng để cùng xây dựng một môi trường lành mạnh và tốt đẹp nhé !</p>
        </div>

        <div class="about-sub-title">2. Khám phá và tìm kiếm</div>
        <div class="about-sub-content">
            <p>Khám phá và thưởng thức các bức ảnh được cộng đồng đóng góp và chia sẻ trên giao diện trang chủ, với đa dạng các chủ đề và phong phú các thể loại biết đâu bạn tìm được thứ mình cần ^.^</p>
            <p>Sử dụng thanh tìm kiếm để tìm kiếm nhanh hơn, hiệu quả hơn đến những hình ảnh bạn muốn tiếp cận, những chủ đề và những lĩnh vực bạn tò mò hoặc muốn tìm hiểu.</p>
        </div>
        {{-- <div class="about-sub-img" style="text-align: center">
            <img src="{{ asset('img/ADS.png') }}" alt="Image">
        </div> --}}

        <div class="about-sub-title">3. Chia sẻ và lưu giữ hình ảnh</div>
        <div class="about-sub-content">
            <p>Xây dựng và đóng góp với cộng đồng thông qua việc chia sẻ các hình ảnh, các ý tưởng của bản thân thông qua đăng tải các bài đăng.</p>
            <div class="about-sub-img" style="text-align: center">
                <img src="{{ asset('img/upload.PNG') }}" alt="Image">
            </div>
            <p>Lưu lại những hình ảnh yêu thích hoặc gây ấn tượng với bạn thông qua việc sử dụng nút "Lưu" trong khi bạn đang xem chi tiết về bài đăng hình ảnh đấy</p>
            <div class="about-sub-img" style="text-align: center">
                <img src="{{ asset('img/bf_int.PNG') }}" alt="Image" width="100%">
            </div>
        </div>

        <div class="about-sub-title">4. Tương tác và góp ý</div>
        <div class="about-sub-content">
            <p>Xem chi tiết một bài đăng (hình ảnh) cho phép bạn tương tác với bài đăng đó thông qua việc để lại comment đóng góp hoặc biểu đạt cảm xúc, lưu bài đăng vào bộ sưu tập của bản thân hay đơn giản là "thả tym" thể hiện yêu thích bức ảnh</p>
            <div class="about-sub-img" style="text-align: center">
                <img src="{{ asset('img/aft_int.PNG') }}" alt="Image" width="100%">
            </div>
        </div>

        <div class="about-sub-title">5. Quản lý bài đăng và bộ sưu tập</div>
        <div class="about-sub-content">
            <p>Bạn có thể dễ dàng xem các bài đăng của bản thân để theo dõi lượt view hoặc comment, thậm chí là việc chỉnh sửa hoặc xóa bài đăng đấy trong tab "Bài đăng" trong phần hồ sơ của bạn</p>
            <div class="about-sub-img" style="text-align: center">
                <img src="{{ asset('img/post_manage.PNG') }}" alt="Image" width="100%" style="padding-bottom: 16px">
            </div>
            <p>Bên cạnh đấy, trong phần hồ sơ của bạn, cũng có thể xem lại các bài đăng mà bạn đã lưu trong các bộ sưu tập của mình. Bạn có thể xóa chúng hoặc chỉ đơn giản là chỉnh sửa thông tin của các bộ sưu tập này. Những bài đăng đã lưu trong đó bạn có thể hủy lưu chúng nếu thấy không cần thiết nữa hoặc lỡ lưu nhầm trước đó.</p>
            <div class="about-sub-img" style="text-align: center">
                <img src="{{ asset('img/ADS.png') }}" alt="Image">
            </div>
        </div>

    </main>
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid footer-signature">
            <p>&copy; Đồ án Website Chia Sẻ Hình Ảnh Tích Hợp DeepLearning - Hà Trung Nghĩa</p>
        </div>
    </footer>

    <!-- Thêm liên kết tới tệp JavaScript của Bootstrap 5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>
