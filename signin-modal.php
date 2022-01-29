<link rel="stylesheet" href="assets/css/login-modal.css">

<div class="main_login modal fade" id="signin_modal" role="dialog">
    <div class="modal-dialog" style="background-color: #fff; padding-bottom: 20px;">
        <div class="form">
            <div class="modal-header title">
                <h3>Đăng nhập</h3>
                <div class="alert alert-warning">
                    Vui lòng đăng nhập để đặt hàng. <br>
                    Bạn chưa có tài khoản? <button class="link" id="btn-signup-link">Đăng kí</button>
                </div>
                <div class="alert alert-danger" id="div-error-signin" style="display: none;"></div>
            </div>
            <form method="POST" id="form-signin">
                <div class="row">
                    <h6>Email <span id="email_error_sign_in" class="error"></span> </h6>
                    <input type="email" name="email" id="email_sign_in">
                </div>
                <div class="row">
                    <h6>Mật khẩu</h6>
                    <input type="password" name="password">
                </div>
                <label class="check">
                    <div style="display: flex; width: 50%;">
                        <input type="checkbox" name="remember" class="checkbox">
                        <p>Ghi nhớ đăng nhập</p>
                    </div>
                    <a href="forgot_password.php" style="width: 50%;text-align: end;">Quên mật khẩu</a>
                </label>
                <button >Đăng nhập</button>
            </form>
        </div>
    </div>
</div>

