<?php session_start();

unset($_SESSION['level'],$_SESSION['id_admin'],$_SESSION['name_admin']);
header('location:index.php');