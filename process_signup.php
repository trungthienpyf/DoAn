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

  
    echo  json_encode("ERROR EMAIL");

    // header('location:signup.php');
    exit;
}
$sql = "insert into customer(name,gender,birthday,email,password,phone,address)
value('$name','$gender','$birthday','$email','$password','$phone','$address')";
mysqli_query($connect, $sql);


$sql = "select id from customer
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;


mysqli_close($connect);
// header('location:index.php');
