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
                <li><a href="" class="active">Thông tin cá nhân</a></li>
                <li><a href="">Đơn hàng</a></li>
                <li><a href="">Quản lí tài khoản</a></li>
            </ul>
        </div>
        <div class="content_right">
            <div class="info">
                <div class="title">
                    <h3>Thông tin cá nhân</h3>
                </div>
                <div>
                    <div class="content">
                        <div class="row">
                            <div class="mod_title"> <label>Tên</label> </div>
                            <input type="text" name="name" value="<?php echo $each['name'] ?>" class="input">
                        </div>
                        <div class="row">
                            <div class="mod_title"> <label>Email</label> </div>
                            <input type="text" name="email" value="<?php echo $each['email'] ?>" class="input">
                        </div>
                        <div class="row">
                            <div class="mod_title"> <label>Số điện thoại</label> </div>
                            <input type="text" name="phone" value="<?php echo $each['phone'] ?>" class="input">
                        </div>
                        <div class="row">
                            <div class="mod_title"> <label>Ngày sinh</label> </div>
                            <input type="date" name="birthday" value="<?php echo $each['birthday'] ?>" class="input">
                        </div>
                        <div class="row">
                            <div class="mod_title" class="input"> <label>Giới tính</label> </div>
                            <select name="gender" id="gender">
                                <option value="1" id="male">Nam</option>
                                <option value="0" id="female">Nữ</option>
                                <option value="null" id="other">Khác</option>
                                <script>
                                    if (<?php echo $each['gender'] ?> === 1) {
                                        document.getElementById("gender").options.selectedIndex = 0;
                                    } else if (<?php echo $each['gender'] ?> === 0) {
                                        document.getElementById("gender").options.selectedIndex = 1;
                                    } else {
                                        document.getElementById("gender").options.selectedIndex = 2;
                                    }
                                </script>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mod_title"> <label>Địa chỉ</label> </div>
                            <textarea name="address" id="address" class="input"><?php echo $each['address'] ?></textarea>
                        </div>
                        <button>Lưu thông tin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main end -->


    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->

</body>

</html>