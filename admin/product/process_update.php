<?php require '../check_admin_login.php';?>

<?php


$id=$_POST['id'];



$name=$_POST['name'];
$price=$_POST['price'];
$img_new=$_FILES['img_new'];

if($img_new['size']>0){
	$folder = "photos/";

	$file_extension= explode('.',$img_new['name'])[1];

	$file_name=time() . '.' . $file_extension;
	$path_file = $folder . $file_name;

	move_uploaded_file($img_new["tmp_name"], $path_file);

}else{
	$file_name=$_POST['img_old'];
}

$description=$_POST['description'];
$id_manufacturers=$_POST['id_manufacturers'];
$id_category=$_POST['id_category'];
require '../connect.php';

if(empty($id) ||empty($name) || empty($price) || empty($description)
 || empty($id_manufacturers) || empty($id_category) ){
	header('location:form_insert.php?error=Hãy nhập đầy đủ thông tin');
exit();
}

$sql="update product 
set 
name='$name',
price='$price',
img='$file_name',
description='$description',
manufacturers_id='$id_manufacturers',
category_detail_id='$id_category'
where id='$id'
";

mysqli_query($connect,$sql);


mysqli_close($connect);

header('location:index.php?success=Sửa thành công');
