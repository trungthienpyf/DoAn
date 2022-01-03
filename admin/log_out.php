<?php session_start();

unset($_SESSION['level'],$_SESSION['id']);
header('location:index.php');