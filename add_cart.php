<?php
try{
session_start();
require 'admin/connect.php';
if(empty($_POST['id'])){
	throw new Exception("Không tồn tại id");
	
}
$id = $_POST['id'];
if (isset($_POST['size'])) {
$size = $_POST['size'];
}
// $sql="update orders
// set size

// "


if (empty($_SESSION['cart'][$id])) {
	require 'admin/connect.php';
	$sql = "select * from product
	where id='$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	$checkrows = mysqli_num_rows($result);
	$_SESSION['cart'][$id]['name'] = $each['name'];
	$_SESSION['cart'][$id]['img'] = $each['img'];
	$_SESSION['cart'][$id]['price'] = $each['price'];
	$_SESSION['cart'][$id]['quantity'] = 1;
	if (isset($size)) {
		$_SESSION['cart'][$id]['size']=$size;
	}
	
} else {
		$_SESSION['cart'][$id]['quantity']++;
}
echo 1;
} catch(Throwable $e){
	echo $e->getMessage();
}



