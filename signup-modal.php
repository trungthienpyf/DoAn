<link rel="stylesheet" href="assets/css/login-modal.css">

<div class="main_login modal fade" id="signup_modal" role="dialog">
    <div class="modal-dialog" style="background-color: #fff; padding-bottom: 20px;">
        <div class="form">
            <div class="modal-header title">
                <h3>Đăng kí</h3>
                <div class="alert alert-warning">
                    Bạn đã có tài khoản? <button class="link" id="btn-signin-link">Đăng nhập</button>
                </div>
                <div class="alert alert-danger" id="div-error-signup" style="display: none;"></div>
            </div>
            <form method="post" id="form-signup">
                <div class="row">
                    <h6>Tên<span id="name_error" class="error"></span></h6>
                    <input type="text" name="name" id="name">
                </div>
                <div class="row">
                    <h6>Email
                        <span id="email_error" class="error"> </span>
                    </h6>
                    <input type="email" name="email" id="email">
                </div>
                <div class="row">
                    <h6>Số điện thoại<span id="phone_error" class="error"></span></h6>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="row">
                    <h6>Mật khẩu <span id="password_error" class="error"></span></h6>
                    <input type="password" name="password" id="password">
                </div>
                <div class="row">
                    <h6>Nhập lại mật khẩu <span id="repassword_error" class="error"></span></h6>
                    <input type="password" id="repassword">
                </div>
                <div class="row">
                    <div class="row_10">
                        <div class="row_4">
                            <h6>Giới tính</h6>
                            <select name="gender" id="gender">
                                <option value="1" selected>Nam</option>
                                <option value="0">Nữ</option>
                                <option value="null">Khác</option>
                            </select>
                        </div>
                        <div class="row_6">
                            <h6>Ngày sinh</h6>
                            <input type="date" name="birthday" value="2002-01-01">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h6>Địa chỉ<span id="address" class="error"></span></h6>
                    <input type="text" name="address" id="address">
                </div>
                <button>Đăng kí</button>
            </form>
        </div>
    </div>
</div>