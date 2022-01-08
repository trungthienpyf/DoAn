<?php

require 'connect.php';

$email=$_POST['email'];

$password=$_POST['password'];
$password=stripcslashes($password);
$password=mysqli_real_escape_string($connect,$password);

$sql="select * from admin where email='$email' and password='$password'";

$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)==1){
	$each=mysqli_fetch_array($result);
	session_start();
	$_SESSION['id_admin']= $each['id'];
	$_SESSION['name_admin']= $each['name'];
	$_SESSION['level']= $each['level'];
	header('location:root/index.php');
	exit;
}


header('location:index.php?error=Email hoặc password không chính xác');