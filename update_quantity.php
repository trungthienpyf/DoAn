
<?php 

session_start();

require 'admin/connect.php';
$id=$_GET['id'];
$type=$_GET['type'];
$sql="select * from product where id ='$id'";
$check=mysqli_query($connect,$sql);
$checkrows=mysqli_num_rows($check);
if($checkrows!==1){
	header('location:view_cart.php');
	exit;

}

if($type==='decrease'){
	if($_SESSION['cart'][$id]['quantity'] > 1 ){
	$_SESSION['cart'][$id]['quantity']--;
	}else{
		unset($_SESSION['cart'][$id]);
	}
}else{
	$_SESSION['cart'][$id]['quantity']++;
}


header('location:view_cart.php');