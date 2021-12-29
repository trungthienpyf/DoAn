<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
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
    <div>
        <div>
            <img src="assets/img/pexels-pixabay-325876.jpg" alt="" class="img_banner">
        </div>
    </div>

    <div class="main">
        <div class="main_001">
            <h3>Sản phẩm mới</h3>
            <ul>
                <?php $count = 0; ?>
                <?php foreach ($result as $each) : ?>
                    <li>
                        <a href="">
                            <img src="admin/product/photos/<?php echo $each['img'] ?>" alt="">
                        </a>
                        <a href=""><?php echo $each['name'] ?></a>
                        <p> <?php echo $each['price'] ?> </p>
                    </li>
                    <?php
                    if ($count >= 4) {
                        break;
                    }
                    $count++; ?>
                <?php endforeach ?>
            </ul>
            <a href="products.php"><button>Xem thêm</button></a>

        </div>
    </div>

    <!-- Main end -->

    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

</html>