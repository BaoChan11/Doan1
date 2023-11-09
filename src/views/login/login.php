<div class="login main">
    <form action="" id="form-login" method="POST">
        <input type="text" name="name-login" id="account-name-input" required placeholder="Tên đăng nhập">
        <input type="password" name="password-login" id="account-password-input" required placeholder="Mật khẩu">
        <input type="submit" id="submit-login-input" name="login" value="ĐĂNG NHẬP">
        <span class="change-form">Đăng Kí</span>
    </form>
    <form action="" id="form-signin" method="POST">
        <input type="text" name="name-signin" id="account-name-input" required placeholder="Tên đăng nhập">
        <input type="text" name="password-signin" id="account-password-signin-input" required placeholder="Mật khẩu">
        <input type="text" name="repassword-signin" id="account-repassword-signin-input" required placeholder="Nhập lại mật khẩu">
        <i id="warning-pass" style="color: red"></i>
        <input type="submit" id="submit-login-input" name="signIn" value="ĐĂNG KÍ">
        <span class="change-form">Đăng Nhập</span>
    </form>
</div>
<script src="./src/js/login.js"></script>
