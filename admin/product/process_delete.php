<?php require '../check_admin_login.php';?>

<?php 
require '../connect.php';

if(empty($_GET['id']))
{
	header('location:index.php');
	exit();
}
$id=$_GET['id'];
$sql="select * from detail_orders where product_id='$id'";
$result_orders=mysqli_query($connect,$sql);
$checkrows=mysqli_num_rows($result_orders);
if($checkrows>=1){
	header('location:index.php?error=Sản phẩm đang được bán không thể xóa');
	exit();
}

$sql="delete from product 
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