<?php require '../check_super_admin_login.php';?>

<?php 

if(empty($_POST['name'])){
	header('location:form_insert.php?error=Phải điền tên nhà sản xuất');
	exit();
}

$name=$_POST['name'];

require'../connect.php';
$check=mysqli_query($connect,"select * from manufacturers where name='$name'");
$checkrows=mysqli_num_rows($check);

if($checkrows>0){
	header('location:form_insert.php?error=Tên vừa nhập đã bị trùng!!');
	exit();
}else{
	$sql="insert into manufacturers(name) values('$name')";
	mysqli_query($connect,$sql);
	header('location:index.php?success=Thêm thành công');
}
