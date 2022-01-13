<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/products.css">
    <title>Cửa hàng</title>
</head>

<body>
    <!-- Connect start -->
    <?php
    require 'admin/connect.php';
    $id = $_GET['id'];

    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $sql_number_of_product = "select count(*) from product join category_detail ON product.category_detail_id=category_detail.id JOIN category on category_detail.category_id=category.id  where category.id='$id'";
    $product_array = mysqli_query($connect, $sql_number_of_product);
    $product_array_result = mysqli_fetch_array($product_array);

    $number_of_product = $product_array_result['count(*)'];

    $product_in_page = 15;

    $number_page = ceil($number_of_product / $product_in_page);
    $skip = $product_in_page * ($page - 1);

    $sql_show_product = "select * from product join category_detail ON product.category_detail_id=category_detail.id JOIN category on category_detail.category_id=category.id  where category.id='$id' 
    limit $product_in_page offset $skip";

    $show_product = mysqli_query($connect, $sql_show_product);

    ?>
    <!-- Connect end-->

    <!-- Header start -->
    <?php
    require 'header.php';
    ?>
    <!-- Header end -->

    <!-- Main start -->
    <div class="main_products">
        <div class="category">
            <div class="header_category">
                <h4>Bộ lọc</h4>
            </div>
            <div class="cate_item">
                <h5>Áo</h5>
                <ul>
                    <?php
                    $sql_category = "select * from category_detail where category_id=1";
                    $result_category = mysqli_query($connect, $sql_category);
                    ?>
                    <ul>
                        <?php foreach ($result_category as $each) { ?>
                            <li><a href=""><?php echo $each['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </ul>
            </div>
            <div class="cate_item">
                <h5>Quần</h5>
                <?php
                $sql_category = "select * from category_detail where category_id=2";
                $result_category = mysqli_query($connect, $sql_category);
                ?>
                <ul>
                    <?php foreach ($result_category as $each) { ?>
                        <li><a href=""><?php echo $each['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="cate_item">
                <h5>Phụ kiện</h5>
                <?php
                $sql_category = "select * from category_detail where category_id=3";
                $result_category = mysqli_query($connect, $sql_category);
                ?>
                <ul>
                    <?php foreach ($result_category as $each) { ?>
                        <li><a href=""><?php echo $each['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="products">
            <div class="header_product">
                <div class="title_product">
                    <h3>Tất cả sản phẩm</h3>
                </div>
                <div class="sort_product">
                    <select name="" id="">
                        <option value="Sản phẩm mới" selected><a href="">Sản phẩm mới </a></option>
                        <option value="Từ thấp lên cao">Từ thấp lên cao</option>
                        <option value="Từ cao xuống thấp">Từ cao xuống thấp</option>
                    </select>
                </div>
            </div>

            <div class="table">
                <?php foreach ($show_product as $each) { ?>
                    <div class="thumbnail">
                        <div class="image">
                            <a href="product-detail">
                                <img class="img_thumb" src="admin/product/photos/<?php echo $each['img'] ?>">
                            </a>
                        </div>
                        <div class="caption">
                            <a href=""><?php echo $each['name'] ?></a>
                            <p class="price"><?php echo $each['price'] ?>đ</p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="page">
                <hr>
                <br>
                <div class="number">
                    <?php
                    if ($page > 1) { ?>
                        <a id="arrow_left" href="?page=<?php echo $page - 1 ?>"><i class="fas fa-angle-double-left"></i></a>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $number_page; $i++) { ?>
                        <?php if ($i == $page) { ?>
                            <a href="?page=<?php echo $i ?>" class="this_page" id="this_page">
                                <?php echo $i ?>
                            </a>
                        <?php } else { ?>
                            <a href="?page=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        <?php } ?>
                    <?php  } ?>

                    <?php
                    if ($page < $number_page) { ?>
                        <a id="arrow_right" href="?page=<?php echo $page + 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    <!-- Main end -->
    <p id="number_page"><?php echo $number_page ?></p>

    <!-- Footer start -->
    <?php require 'footer.php' ?>
    <!-- Footer end -->
</body>


</html>