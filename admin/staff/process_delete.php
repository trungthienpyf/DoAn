<?php require '../check_super_admin_login.php';?>

<?php
require '../connect.php';
if(empty($_GET['id']))
{
	header('location:index.php');
	exit();
}
$id=$_GET['id'];
$sql="delete from admin where id='$id'";
mysqli_query($connect,$sql);

mysqli_close($connect);
header('location:index.php?success=Xóa thành công');