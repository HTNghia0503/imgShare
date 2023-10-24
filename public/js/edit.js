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

