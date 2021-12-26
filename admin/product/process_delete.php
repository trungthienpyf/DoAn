<?php 
require '../connect.php';

$id=$_GET['id'];
$sql="delete  from product 
where id='$id'";
mysqli_query($connect,$sql);

mysqli_close($connect);

header('location:index.php?success=Xóa thành công');