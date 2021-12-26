<?php 


require'../connect.php';
$id=$_POST['id'];
$name=$_POST['name'];
if(empty($_POST['name']) || empty($_POST['id']) ){
	header('location:form_update.php?id='.$id.'&error=Phải điền tên nhà sản xuất');
	exit();
}

$check=mysqli_query($connect,"select * from manufacturers where name='$name'");
$checkrows=mysqli_num_rows($check);
if($checkrows>0){
	header('location:form_update.php?id='.$id.'&error=Tên vừa nhập đã bị trùng!!');
	exit();
}else{
	$sql="update manufacturers 
	set 
	name='$name'
	where id='$id'
	";

	mysqli_query($connect,$sql);

	header('location:index.php?success=Sửa thành công');
}

