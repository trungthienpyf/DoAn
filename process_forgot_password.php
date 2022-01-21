<?php
$email = $_POST['email'];
require 'admin/connect.php';
$sql = "select id,name from customer where email = '$email'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) === 1) {
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "delete from forgot_password where customer_id = '$id'";
    mysqli_query($connect, $sql);
    $token = uniqid();
    $sql = "insert into forgot_password(customer_id,token)
    values ('$id','$token')";
    mysqli_query($connect, $sql);
    
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $link = $url . '/doan/change_password.php?token=' . $token;
    require 'mail.php';
    $title = 'Đổi mật khẩu mới';
    $content = "Bấm vào <a href='$link'> đây </a> để đổi mật khẩu. ";
    sendmail($email, $name, $title, $content);
    header('location:change_password.php');
}
