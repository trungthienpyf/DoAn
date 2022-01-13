<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Shop</title>
</head>

<body>
    <!-- Header start -->
    <?php
    require 'header.php';
    ?>
    <!-- Header end -->

    <!-- Main start -->
    <div>
        <img src="assets/img/pexels-pixabay-325876.jpg" alt="" class="img_banner">
    </div>

    <div class="main">
        <div class="main_001">
            <h3>Sản phẩm mới</h3>
            <ul>
                <?php $count = 0; ?>
                <?php
                $sql = "select * from product
                ORDER BY RAND()
                LIMIT 5";
                $result = mysqli_query($connect, $sql);
                foreach ($result as $each) {
                ?>
                    <li>
                        <a href="product_detail.php?id=<?php echo $each['id'] ?>">
                            <img src="admin/product/photos/<?php echo $each['img'] ?>">
                        </a>
                        <a href="product_detail.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
                        <p> <?php echo number_format($each['price'], 0, '', '.'); ?> ₫</p>
                    </li>
                <?php } ?>
            </ul>
            <a href="products.php" class="button"><button>Xem thêm</button></a>
        </div>
    </div>
    <!-- Main end -->

    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

</html>