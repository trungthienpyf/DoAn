<?php
require 'admin/connect.php';
session_start();

if (empty($_POST['phone']) || empty($_POST['name']) || empty($_POST['address'])) {
	echo "Bạn phải điền đầy đủ thông tin";
	exit;
}

$phone_receive = $_POST['phone'];
$name_receive = $_POST['name'];
$address_receive = $_POST['address'];
$note = $_POST['note'];

$cart = $_SESSION['cart'];
if (isset($_SESSION['id'])) {
	$customer_id = $_SESSION['id'];
} else {
	$customer_id = 18;
}

$total_price = 0;
$status = 0;

foreach ($cart as $product_id => $id) {
	foreach ($id as $size => $each) {
		$total_price += $each['quantity'] * $each['price'];
	}
}
$sql = "insert into orders(name_receive, phone_receive, address_receive, note, status, customer_id, total_price) 
values('$name_receive', '$phone_receive', '$address_receive', '$note', '$status', '$customer_id', '$total_price')";
mysqli_query($connect, $sql);

$sql = "select max(id) from orders where customer_id='$customer_id'";
$result = mysqli_query($connect, $sql);

$orders_id = mysqli_fetch_array($result)['max(id)'];
$quantity = 0;
foreach ($cart as $product_id => $id) {
	foreach ($id as $size => $each) {
		$quantity = $each['quantity'];
		$sql = "insert into detail_orders(orders_id, product_id, quantity,size) 
	values('$orders_id','$product_id','$quantity','$size')";
		mysqli_query($connect, $sql);
	}
}
unset($_SESSION['cart']);
echo "1";
mysqli_close($connect);
