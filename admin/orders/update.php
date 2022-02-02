<?php require '../connect.php';
// if(empty($_GET['id']) ||empty($_GET['status'])){
// 	header('location:index.php?error=Hãy truyền mã');
// 	exit;
// }
$id=$_GET['id'];
$status=$_GET['status'];

$sql="select * from orders where id='$id'";
$row=mysqli_query($connect,$sql);
$check_row=mysqli_num_rows($row);
if($check_row !==1 ){
	header('location:index.php?error=Hãy truyền mã');
	exit;
}
if($status>2 || $status <1){
	header('location:index.php?error=Bạn không được phép sửa đổi url');
	exit;

}


$sql="update orders set status='$status' where id='$id'";

mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');