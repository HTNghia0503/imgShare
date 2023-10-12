/*--- Đăng nhập ---*/
// Lắng nghe sự kiện click nút Show/Hide Mật khẩu
document.getElementById("togglePasswordLogin").addEventListener("click", function() {
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
/*-------------------------------------------------------*/

/*--- Đăng ký ---*/
var elementSignup = document.getElementById("signupLink"); // Kiểm tra tồn tại nút "Đăng ký"
var elementSignupNow = document.getElementById("signupNowLink"); // Kiểm tra tồn tại nút "Đăng ký ngay"
// Nếu tồn tại -> Khi nhắn vào "Đăng ký" -> Hiển thị Modal đăng ký
if (elementSignup) {
    elementSignup.addEventListener("click", function() {
        var myModal = new bootstrap.Modal(document.getElementById('signupModal'));
        myModal.show();
    });
    // Với trường hợp nút "Đăng ký ngay"
    elementSignupNow.addEventListener("click", function(event) {
        var myModal = new bootstrap.Modal(document.getElementById('signupModal'));
        myModal.show();
    });
}

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

/*-------------------------------------------------------*/

/*--- Đăng tải ---*/
// Hiển thị form Đăng tải khi nhấn nút Đăng tải
var elementUpload = document.getElementById('uploadLink'); // Kiểm tra tồn tại của nút Đăng tải
// Nếu tồn tại -> Nhấn "Đăng tải" -> Hiển thị Modal Đăng tải
if (elementUpload) {
    elementUpload.addEventListener("click", function() {
        var myModal = new bootstrap.Modal(document.getElementById('uploadModal'));
        myModal.show();
    });
}


