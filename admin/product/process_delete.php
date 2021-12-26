<?php 
require '../connect.php';

$id=$_GET['id'];
$sql="delete  from product 
where id='$id'";



$sql_delete="select * from product where id='$id'";
$result_delete=mysqli_query($connect,$sql_delete);
$each=mysqli_fetch_array($result_delete);


$folder = "photos/";
$path_file = $folder . $each['img'];

unlink($path_file);
mysqli_query($connect,$sql);
    
mysqli_close($connect);
header('location:index.php?success=Xóa thành công');