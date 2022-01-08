<?php
$id = $_POST['id'];
$password_old = $_POST['password_old'];
$password = $_POST['password'];

require '../admin/connect.php';
$sql = "select * from customer where id = '$id' limit 1";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
if ($password_old === $each['password']) {
    $sql = "update customer
    set
    password ='$password'
    where 
    id = '$id'
    ";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
    // header('location:index.php');
}
session_start();
$_SESSION['error'] = "Mật khẩu cũ không đúng";
// header('location:index.php');
