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
