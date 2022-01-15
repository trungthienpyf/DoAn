<?php require '../check_super_admin_login.php';?>

<?php 

if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['password'])){
	header('location:form_insert.php?error=Phải đầy đủ thông tin');
	exit();
}

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$level=$_POST['level'];
$password=$_POST['password'];

require'../connect.php';
$sql="insert into admin(name,phone,email,address,level,password) 
values('$name','$phone','$email','$address',0,'$password')";
mysqli_query($connect,$sql);
header('location:index.php?success=Thêm thành công');

