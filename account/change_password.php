<!-- Connect start -->
<?php require '../admin/connect.php'; ?>
<!-- Connect end-->
<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/account.css">
    <title>Document</title>
</head>

<body>
    <!-- Header start -->
    <?php require 'header.php' ?>
    <!-- Header end -->

    <!-- Main start -->
    <?php
    $id = $_SESSION['id'];
    $sql = "select * from customer where id = '$id' limit 1";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div class="main_account">
        <div class="menu_left">
            <ul>
                <li>
                    <div class="account">
                        <i class="fas fa-user"></i>
                        <div>
                            <p>Tài khoản của</p>
                            <h6><?php echo $each['name'] ?></h6>
                        </div>

                    </div>
                </li>
                <li><a href="index.php">Thông tin cá nhân</a></li>
                <li><a href="order.php">Đơn hàng</a></li>
                <li><a href="" class="active">Đổi mật khẩu</a></li>
            </ul>
        </div>
        <div class="content_right">
            <div class="info">
                <div class="title">
                    <h3>Đổi mật khẩu</h3>
                </div>
                <div class="content">
                    <?php if (isset($_SESSION['noti'])) { ?>
                        <div>
                            <h4><?php echo $_SESSION['noti'] ?></h4>
                            <?php unset($_SESSION['noti']); ?>
                        </div>
                    <?php } else { ?>
                        <form method="POST" action="process_change_password.php">
                            <input type="hidden" name="id" style="display: none;" value="<?php echo $each['id'] ?>">
                            <div class="row">
                                <div class="mod_title">Nhập mật khẩu cũ</div>
                                <input type="password" name="password_old" class="input" id="password_old">
                                <span id="password_old_error" class="error">
                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="row">
                                <div class="mod_title">Nhập mật khẩu mới</div>
                                <input type="password" name="password" class="input" id="password">
                                <span id="password_error" class="error"></span>
                            </div>
                            <div class="row">
                                <div class="mod_title">Nhập lại mật khẩu mới</div>
                                <input type="password" class="input" id="repassword">
                                <span id="repassword_error" class="error"></span>
                            </div>
                            <button onclick=" return check_update_password()">Lưu thông tin</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main end -->


    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->

</body>
<script src="../assets/js/account.js"></script>

</html>