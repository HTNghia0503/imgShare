/*--- Đăng nhập ---*/
var showPassLogin = document.getElementById("togglePasswordLogin");
// Lắng nghe sự kiện click nút Show/Hide Mật khẩu
if (showPassLogin) {
    showPassLogin.addEventListener("click", function() {
        var passwordInput = document.getElementById("passwordLogin");
        var passwordIcon = document.getElementById("passwordIconLogin");

        // Nếu type của trường mật khẩu là "password", chuyển nó thành "text" để hiển thị mật khẩu
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            // Nếu type của trường mật khẩu là "text", chuyển nó thành "password" để ẩn mật khẩu
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    });
}
/*-------------------------------------------------------*/

/*--- Đăng ký ---*/
var showPassRegister = document.getElementById("togglePasswordRegister");
// Lắng nghe sự kiện click trên nút togglePassword
if (showPassRegister) {
    showPassRegister.addEventListener("click", function() {
        var passwordInput = document.getElementById("passwordRegister");
        var passwordIcon = document.getElementById("passwordIconRegister");

        // Nếu loại của trường mật khẩu là "password", chuyển nó thành "text" để hiển thị mật khẩu
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            // Nếu loại của trường mật khẩu là "text", chuyển nó thành "password" để ẩn mật khẩu
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    });
}

$(document).ready(function() {
    $('#createCollectionBtn').on('click', function () {
        // Lấy tên bộ sưu tập từ trường nhập liệu
        console.log($('#collectionName').val());
        var collectionName = $('#collectionName').val();
        // Gửi tên bộ sưu tập lên máy chủ (có thể sử dụng Ajax)
        $.ajax({
            url: '/create-collection', // Đặt URL tạo bộ sưu tập ở đây
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(), // Lấy token từ form
                collectionName: collectionName
            },
            success: function (response) {
                if (response.success) {
                    // Đóng modal
                    $('#createCollectionModal').modal('hide');

                    // Cập nhật danh sách bộ sưu tập
                    updateCollections();
                } else {
                    // Xử lý lỗi nếu cần
                }
            }
        });
        // Hàm cập nhật danh sách bộ sưu tập
        function updateCollections() {
            // Gửi yêu cầu Ajax để lấy danh sách bộ sưu tập
            $.ajax({
                url: '/get-collections', // Đặt URL để lấy danh sách bộ sưu tập ở đây
                method: 'GET',
                success: function (response) {
                    if (response.success) {
                        // Cập nhật `select` trong modal đăng tải
                        var select = $('#pickCollection');
                        select.empty();

                        $.each(response.collections, function (index, collection) {
                            select.append(new Option(collection.title, collection.id));
                        });
                    } else {
                        // Xử lý lỗi nếu cần
                    }
                }
            });
        }

        // Sau khi tạo bộ sưu tập, ẩn modal
        $('#createCollectionModal').modal('hide');
    });
});
