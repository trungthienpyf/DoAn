<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="admin/css/style_view_cart.css">
    <script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
    <title>Shop</title>
</head>

<body>

    <!-- Connect start -->
    <?php
    require 'admin/connect.php';
    $sql = "select product.*, manufacturers.name as manufacturer_name
     from product
     join manufacturers ON product.manufacturers_id=manufacturers.id;";
    $result = mysqli_query($connect, $sql);
    
    ?>
    <!-- Connect end-->

    <!-- Header start -->
    <?php
    require 'header.php';
    ?>
    <!-- Header end -->


    <!-- Main start -->
    
    <div class="main">

    