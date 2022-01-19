
<?php 

session_start();

require 'admin/connect.php';
$id=$_GET['id'];
$size=$_GET['size'];
$type=$_GET['type'];
$sql="select * from product where id ='$id'";
$check=mysqli_query($connect,$sql);
$checkrows=mysqli_num_rows($check);
if($checkrows!==1){
	header('location:view_cart.php');
	exit;

}

if($type==='decrease'){
	if($_SESSION['cart'][$id][$size]['quantity'] > 1 ){
	$_SESSION['cart'][$id][$size]['quantity']--;
	}else{
		unset($_SESSION['cart'][$id][$size]);
	}
}else{
	$_SESSION['cart'][$id][$size]['quantity']++;
}


header('location:view_cart.php');