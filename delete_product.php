<?php
session_start();

$id = $_POST['id'];
$size = $_POST['size'];
unset($_SESSION['cart'][$id][$size]);
if (empty($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}
if (empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}