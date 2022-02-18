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
                <li><a href="order.php">Đơn hàng</a></li>
                <li><a href="change_password.php">Đổi mật khẩu</a></li>
            </ul>
        </div>
        <div class="content_right">
            <div class="info">
                <div class="title">
                    <h3>Thông tin cá nhân</h3>
                </div>
                <div class="content">
                    <form id="form-update">
                        <input type="hidden" name="id" style="display: none;" value="<?php echo $each['id'] ?>">
                        <div class="row">
                            <div class="mod_title"> Tên</div>
                            <input type="text" name="name" value="<?php echo $each['name'] ?>" class="input" id="name">
                            <span id="name_error" class="error"></span>
                        </div>
                        <div class="row">
                            <div class="mod_title"> Email</div>
                            <input type="text" name="email" value="<?php echo $each['email'] ?>" class="input" id="email">
                            <span id="email_error" class="error">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="mod_title"> Số điện thoại</div>
                            <input type="text" name="phone" value="<?php echo $each['phone'] ?>" class="input" id="phone">
                            <span id="phone_error" class="error"></span>
                        </div>
                        <div class="row">
                            <div class="mod_title">Ngày sinh</div>
                            <input type="date" name="birthday" value="<?php echo $each['birthday'] ?>" class="input">
                        </div>
                        <div class="row">
                            <div class="mod_title" class="input">Giới tính </div>
                            <select name="gender" id="gender">
                                <option value="1" id="male">Nam</option>
                                <option value="0" id="female">Nữ</option>
                                <option value="null" id="other">Khác</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mod_title"> Địa chỉ</div>
                            <textarea name="address" id="address" class="input"><?php echo $each['address'] ?></textarea>
                        </div>
                        <button onclick="return check_update_account()">Lưu thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main end -->


    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../assets/js/account.js"></script>
<script>
    //gender options
    if (<?php echo $each['gender'] ?> === 1) {
        document.getElementById("gender").options.selectedIndex = 0;
    } else if (<?php echo $each['gender'] ?> === 0) {
        document.getElementById("gender").options.selectedIndex = 1;
    } else {
        document.getElementById("gender").options.selectedIndex = 2;
    }
</script>
<script>
    $(document).ready(function() {
        $("#form-update").submit(function(e) {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: "process_update_account.php",
                    data: $("#form-update").serializeArray(),
                    dataType: "html",
                })
                .done(function(response) {
                    if (response === 'error') {
                        $("#email_error").text("Email đã được sử dụng");
                        $("#email_error").show();
                    } else {
                        alert("Cập nhật thông tin thành công!")
                        location.reload();
                    }
                });

        });
    });
</script>

</html>