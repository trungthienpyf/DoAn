<?php require '../check_super_admin_login.php';?>

<?php 


require'../connect.php';
if(empty($_POST['name']) || empty($_POST['id']) ||empty($_POST['email']) ||empty($_POST['password']) || empty($_POST['phone']) ){
	header('location:form_update.php?error=Phải thông tin');
	exit();
}
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="update admin 
set 
name='$name',
email='$email',
password='$password',
phone='$phone',
address='$address'
where id='$id'
";

mysqli_query($connect,$sql);

header('location:index.php?success=Sửa thành công');

