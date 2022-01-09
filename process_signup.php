<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];

require 'admin/connect.php';
$sql = "select count(*) from customer
where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if ($number_rows == 1) {
    session_start();
    $_SESSION['error'] = "Email đã được sử dụng";
    header('location:signup.php');
    exit;
}
$sql = "insert into customer(name,gender,birthday, email,password)
value('$name','$gender','$birthday','$email','$password')";
mysqli_query($connect, $sql);

$sql = "select id from customer
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;

header('location:index.php');
mysqli_close($connect);
