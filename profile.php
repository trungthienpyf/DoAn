<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>Document</title>
</head>

<body>
    <!-- Header start -->
    <?php require 'header.php' ?>
    <!-- Header end -->
    <h1>Đây là trang người dùng</h1>
    <?php
    echo $_SESSION['name'];
    ?>

    <a href="signout.php">
        Đăng xuất ở đây.
    </a>
    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->

</body>

</html>