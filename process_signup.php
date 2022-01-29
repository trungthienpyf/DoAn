<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require 'admin/connect.php';
$sql = "select count(*) from customer
where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if ($number_rows == 1) {
    session_start();
    $_SESSION['error'] = "Email đã được sử dụng";
    echo "error";
    // header('location:signup.php');
    exit;
}
$sql = "insert into customer(name,gender,birthday,email,password,phone,address)
value('$name','$gender','$birthday','$email','$password','$phone','$address')";
mysqli_query($connect, $sql);

require 'mail.php';
$title = "Đăng kí tài khoản thành công";
$content = "Cảm ơn $name đã đăng kí tài khoản. Chúc bạn mua sắm vui vẻ.";
sendmail($email, $name, $title, $content);

$sql = "select id from customer
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

echo "1";
mysqli_close($connect);
// header('location:index.php');
