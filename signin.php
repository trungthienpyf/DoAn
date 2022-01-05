<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end -->
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
        <div class="form" id="signup" style="display: none;">
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
                            if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            }
                            ?>
                        </span>
                    </h6>
                    <input type="email" name="email" id="email">
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
                <button onclick="return check_sign_up()">Đăng kí</button>
                <div class="ask">
                    <p>Bạn đã có tài khoản? <a href="signin.php">Đăng nhập</a></p>
                </div>
            </form>
        </div>


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

        <a href="signout.php">đăng xuất</a>
    </div>
    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

<script src="assets/js/login.js"></script>

</html>