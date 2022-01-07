<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end -->
<?php
if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    $sql = "select * from customer
         where token = '$token'
         limit 1";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    if ($number_rows == 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
}
if (isset($_SESSION['id'])) {
    header('location:profile.php');
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
            <form action="process_signin.php" method="POST">
                <div class="title">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="row">
                    <h6>Email <span id="email_error_sign_in" class="error"></span> </h6>
                    <input type="email" name="email" id="email_sign_in">
                </div>
                <div class="row">
                    <h6>Mật khẩu</h6>
                    <input type="password" name="password">
                </div>
                <label class="check">
                    <input type="checkbox" name="remember" class="checkbox">
                    <p>Ghi nhớ đăng nhập</p>
                </label>
                <span class="error">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </span>
                <button onclick="return check_sign_in()">Đăng nhập</button>
                <div class="ask">
                    <p>Bạn đã chưa có tài khoản? <a href="signup.php">Đăng kí</a></p>
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