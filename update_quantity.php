<?php
session_start();
require 'admin/connect.php';
$id = $_POST['id'];
$type = $_POST['type'];
$size = $_POST['size'];

if ($type === "1") {
	$_SESSION['cart'][$id][$size]['quantity']++;
} else {
	if ($_SESSION['cart'][$id][$size]['quantity'] > 1) {
		$_SESSION['cart'][$id][$size]['quantity']--;
	} else {
		unset($_SESSION['cart'][$id][$size]);
		if (empty($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}
		if (empty($_SESSION['cart'])) {
			unset($_SESSION['cart']);
		}
	}
}
