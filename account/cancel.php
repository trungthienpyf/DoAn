<?php
$order_id = $_POST['id'];
require '../admin/connect.php';
$sql = "UPDATE orders SET status=2 WHERE id = '$order_id'";
mysqli_query($connect, $sql);


// header('location:order.php');
