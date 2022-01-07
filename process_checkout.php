<?php 

$phone_receive=$_POST['phone'];
$name_receive=$_POST['name'];
$address_receive=$_POST['address'];
$note=$_POST['note'];
require 'admin/connect.php';
session_start();

if(empty($_POST['phone'])||empty($_POST['name'])|| empty($_POST['address'])){
	header('location:view_cart.php?error=Vui lòng điền thông tin cụ thể');
	exit;
}


$cart=$_SESSION['cart'];
$customer_id=$_SESSION['id'];

$total_price=0;

$status=0;

foreach ($cart as $key => $each) {
	$total_price+=$each['quantity']*$each['price'];
}
$sql="insert into orders( name_receive, phone_receive, address_receive, note, status, customer_id, total_price) values('$name_receive', '$phone_receive', '$address_receive', '$note', '$status', '$customer_id', '$total_price')";
mysqli_query($connect,$sql);

$sql="select max(id) from orders where customer_id='$customer_id'";
$result=mysqli_query($connect,$sql);

$orders_id=mysqli_fetch_array($result)['max(id)'];
$quantity=0;
foreach ($cart as $product_id => $each) {
	$quantity=$each['quantity'];
	$sql="insert into detail_orders(orders_id, product_id, quantily) 
	values('$orders_id','$product_id','$quantity')";
	mysqli_query($connect,$sql);
}

unset($_SESSION['cart']);
mysqli_close($connect);
header('location:view_cart.php?success=Đặt hàng thành công');




