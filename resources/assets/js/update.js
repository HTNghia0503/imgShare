// Hiển thị form Đăng nhập khi nhấn nút
document.getElementById("loginLink").addEventListener("click", function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng)
    var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
    myModal.show();
});

// Hiển thị form Đăng ký khi nhấn nút Đăng ký
document.getElementById("signupLink").addEventListener("click", function(event) {
    event.preventDefault();
    var myModal = new bootstrap.Modal(document.getElementById('signupModal'));
    myModal.show();
});

// Hiển thị form Đăng ký khi nhấn nút Đăng ký ngay
document.getElementById("signupNowLink").addEventListener("click", function(event) {
    event.preventDefault();
    var myModal = new bootstrap.Modal(document.getElementById('signupModal'));
    myModal.show();
});

// Lắng nghe sự kiện click trên nút togglePassword
document.getElementById("togglePassword").addEventListener("click", function() {
    var passwordInput = document.getElementById("passwordSignUp");
    var passwordIcon = document.getElementById("passwordIcon");

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

// Hiển thị form Đăng tải khi nhấn nút Đăng tải
document.getElementById("uploadLink").addEventListener("click", function(event) {
    event.preventDefault();
    var myModal = new bootstrap.Modal(document.getElementById('uploadModal'));
    myModal.show();
});

// Chọn hiển thị hình ảnh
// document.getElementById("file-upload").addEventListener("change", function() {
//     var selectedImage = document.getElementById("selected-image");
//     var label = document.querySelector(".custom-file-label");

//     if (this.files && this.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             selectedImage.src = e.target.result;
//             selectedImage.style.display = "block";
//             label.textContent = "Hình ảnh đã chọn";
//         };
//         reader.readAsDataURL(this.files[0]);
//     } else {
//         selectedImage.style.display = "none";
//         label.textContent = "Chọn hình ảnh";
//     }
// });
