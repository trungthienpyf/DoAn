<?php 
$order_id = $_GET['order_id'];
require '../admin/connect.php';
$sql= "delete from detail_orders where orders_id = '$order_id'";
mysqli_query($connect,$sql);
$sql= "delete from orders where id = '$order_id'";
mysqli_query($connect,$sql);


header('location:order.php');
