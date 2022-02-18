<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require '../admin/connect.php';
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

echo "1";
mysqli_close($connect);
header('location:index.php');
