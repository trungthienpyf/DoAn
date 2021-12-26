<?php
$name=$_POST['name'];
$price=$_POST['price'];
$img=$_FILES['img'];
$description=$_POST['description'];
$id_manufactures=$_POST['id_manufactures'];
$id_category=$_POST['id_category'];
require '../connect.php';

if(empty($name) || empty($img) || empty($price) || empty($description)
 || empty($id_manufactures) || empty($id_category) ){
	header('location:form_insert.php?error=Hãy nhập đầy đủ thông tin');
exit();
}

$folder = "photos/";

$file_extension= explode('.',$img['name'])[1];

$file_name=time() . '.' . $file_extension;
$path_file = $folder . $file_name;

move_uploaded_file($img["tmp_name"], $path_file);



$sql="insert into product(name,description,img,price,id_manufactures,id_category) 
values('$name','$description','$file_name','$price','$id_manufactures','$id_category')";


mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php?success=Thêm thành công');
