<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end -->
<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    require 'admin/connect.php';
    $sql = "select *  from forgot_password where token = '$token'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) === 0) {
        header('location:forgot_password.php?error=error');
    }
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
        <?php if (isset($_GET['token'])) { ?>
            <div class="form">
                <form action="process_change_password.php" method="POST">
                    <div class="title">
                        <h3>Mật khẩu mới</h3>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                    <div class="row">
                        <h6>Mật khẩu mới<span id="password_error" class="error"></span></h6>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="row">
                        <h6>Nhập lại mật khẩu <span id="repassword_error" class="error"></span></h6>
                        <input type="password" id="repassword">
                    </div>
                    <span class="error">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                    <button onclick="return check_password()">Xác nhận</button>
                </form>
            </div>
        <?php } else
        if (isset($_GET['success'])) { ?>
            <div class="noti">
                <div style="text-align: center;">
                    <h4>Đổi mật khẩu thành công </h4>
                    <br>
                    <p>Vui lòng <a href="signin.php" style="color: #e63946;">Đăng nhập</a> lại</p>
                </div>

            </div>
        <?php } else { ?>
            <div class="noti">
                <h4>Xin kiểm tra email của bạn.</h4>
            </div>
        <?php } ?>
    </div>
    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

<script src="assets/js/login.js"></script>

</html>