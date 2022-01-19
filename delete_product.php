<?php
session_start();

$id=$_GET['id'];
$size=$_GET['size'];
unset($_SESSION['cart'][$id][$size]);

header('location:view_cart.php');