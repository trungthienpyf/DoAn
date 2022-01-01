<?php require '../check_super_admin_login.php';?>

<?php 

if(empty($_POST['name'])){
header('location:form_insert.php?error=Phải điền tên danh mục');
exit();
}
$name=$_POST['name'];
$category_id=$_POST['category_id'];

require '../connect.php';


$check=mysqli_query($connect,"select * from category_detail where name='$name'");
$checkrows=mysqli_num_rows($check);
if($checkrows>0){
	header('location:form_insert.php?error=Đã tồn tại danh mục này');
	exit();
}

$sql="insert into category_detail(name,category_id) values('$name','$category_id')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success=Thêm thành công');