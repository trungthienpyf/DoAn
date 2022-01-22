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
    <?php
    require 'header.php';
    ?>
    <!-- Header end -->
    <div class="main_login">
        <div class="form">
            <form action="process_forgot_password.php" method="POST">
                <div class="title">
                    <h3>Quên mật khẩu</h3>
                </div>
                <div class="row">
                    <h6>Email <span id="email_error_sign_in" class="error"></span> </h6>
                    <input type="email" name="email" id="email_sign_in">
                </div>
                <span class="error">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </span>
                <button onclick="return check_sign_up()">Nhận liên kết xác minh</button>

            </form>
            <div class="ask">
                <p>Bạn đã nhớ lại tài khoản? <a href="signin.php">Đăng nhập</a></p>
            </div>
        </div>

    </div>
    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

<script src="assets/js/login.js"></script>

</html>