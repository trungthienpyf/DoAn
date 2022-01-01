<?php require '../check_super_admin_login.php';?>

<?php



require '../connect.php';

$id=$_POST['id'];
$name=$_POST['name'];

if(empty($_POST['id']) || empty($_POST['name'])){
	header('location:form_update.php?id='.$id.'&error=Phải điền tên danh mục');
	exit();
}


$check=mysqli_query($connect,"select * from category where name='$name'");
$checkrows=mysqli_num_rows($check);
if($checkrows>0){
	header('location:form_insert.php?id='.$id.'&error=Đã tồn tại danh mục này');
	exit();
}


$sql="update category 
set 
name='$name'
where id='$id'
";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success=Sửa thàn công');