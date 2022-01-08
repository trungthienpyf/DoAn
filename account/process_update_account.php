<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require '../admin/connect.php';
$sql = "update customer
set
name ='$name',
email ='$email',
gender ='$gender',
birthday ='$birthday',
phone= '$phone',
address ='$address'
where 
id = '$id'
";
mysqli_query($connect, $sql);
mysqli_close($connect);
header('location:index.php');
