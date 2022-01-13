<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end -->
<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location:account');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
    <title>Đăng nhập </title>
</head>

<body>
    <!-- Header start -->
    <?php require 'header.php'; ?>
    <!-- Header end -->


    <div class="main_login">
        <div class="form">
            <div class="title">
                <h3>Đăng kí</h3>
            </div>
            <form method="post" action="process_signup.php">
                <div class="row">
                    <h6>Tên<span id="name_error" class="error"></span></h6>
                    <input type="text" name="name" id="name">
                </div>
                <div class="row">
                    <h6>Email
                        <span id="email_error" class="error">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </span>
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
                <button onclick="return check_sign_up()">Đăng kí</button>
                <div class="ask">
                    <p>Bạn đã có tài khoản? <a href="signin.php">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

<script src="assets/js/login.js"></script>

</html>