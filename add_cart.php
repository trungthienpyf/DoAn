
<?php
session_start();
require 'admin/connect.php';
if(empty($_GET['id'])){
	header('location:products.php');
	exit;
}
$id = $_GET['id'];

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
} else {
	$_SESSION['cart'][$id]['quantity']++;
}


header('location:product_detail.php?id=' . $id);
