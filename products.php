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
    <script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/products.css">
    <title>Cửa hàng</title>
</head>

<body>

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
                <a href="products.php?category=Áo" class="cate">
                    <h5>Áo</h5>
                </a>
                <ul>
                    <?php
                    $sql_top = "select * from category_detail where category_id=1";
                    $result_top = mysqli_query($connect, $sql_top);
                    ?>
                    <?php foreach ($result_top as $each) { ?>
                        <li> <a href="products.php?category=<?php echo $each['name'] ?>"><?php echo $each['name'] ?></a></li>

                    <?php } ?>
                </ul>
            </div>
            <div class="cate_item">
                <a href="products.php?category=Quần" class="cate">
                    <h5>Quần</h5>
                </a>
                <ul>
                    <?php
                    $sql_top = "select * from category_detail where category_id=2";
                    $result_top = mysqli_query($connect, $sql_top);
                    ?>
                    <?php foreach ($result_top as $each) { ?>
                        <li> <a href="products.php?category=<?php echo $each['name'] ?>"><?php echo $each['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="cate_item">
                <a href="products.php?category=Phụ kiện" class="cate">
                    <h5>Phụ kiện</h5>
                </a>
                <ul>
                    <?php
                    $sql_top = "select * from category_detail where category_id=3";
                    $result_top = mysqli_query($connect, $sql_top);
                    ?>
                    <?php foreach ($result_top as $each) { ?>
                        <li> <a href="products.php?category=<?php echo $each['name'] ?>"><?php echo $each['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        <?php if (isset($_GET['category'])) {
            $category = $_GET['category'];
        ?>
            <div class="products">
                <div class="header_product">
                    <div class="title_product">
                        <h3><?php echo $category ?></h3>
                    </div>
                    <div class="sort_product">
                        <select name="" id="">
                            <option value="Sản phẩm mới" selected><a href="">Sản phẩm mới </a></option>
                            <option value="Từ thấp lên cao">Từ thấp lên cao</option>
                            <option value="Từ cao xuống thấp">Từ cao xuống thấp</option>

                        </select>
                    </div>
                </div>
                <?php
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                $sql_number_of_product = "select count(*) from product
                join category_detail on product.category_detail_id = category_detail.id
                where category_detail.name = '$category'";
                $product_array = mysqli_query($connect, $sql_number_of_product);
                $product_array_result = mysqli_fetch_array($product_array);
                $number_of_product = $product_array_result['count(*)'];

                $product_in_page = 12;

                $number_page = ceil($number_of_product / $product_in_page);
                $skip = $product_in_page * ($page - 1);

                $sql_show_product = "select product.*, category_detail.name
                from product
                join category_detail on product.category_detail_id = category_detail.id
                where category_detail.name = '$category'
                limit $product_in_page offset $skip";
                $show_product = mysqli_query($connect, $sql_show_product);

                if (mysqli_num_rows($show_product) == 0) {
                    $sql_show_product = "select product.*, category.name as cate 
                    from product
                    join category_detail on product.category_detail_id = category_detail.id
                    JOIN category ON category_detail.category_id = category.id
                    WHERE category.name = '$category'
                    limit $product_in_page offset $skip";
                    $show_product = mysqli_query($connect, $sql_show_product);
                }

                ?>
                <div class="table">
                    <?php foreach ($show_product as $each) { ?>
                        <div class="thumbnail">
                            <div class="image">
                                <a href="product_detail.php?id=<?php echo $each['id'] ?>">
                                    <img class="img_thumb" src="admin/product/photos/<?php echo $each['img'] ?>">
                                </a>
                            </div>
                            <div class="caption">
                                <a href=""><?php echo $each['name'] ?></a>
                                <p class="price"><?php echo number_format($each['price'], 0, '', '.'); ?> đ</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="page">
                    <hr>
                    <div class="number">
                        <?php
                        if ($page > 1) { ?>
                            <a id="arrow_left" href="?page=<?php echo $page - 1 . "&category=" . $category ?>"><i class="fas fa-angle-double-left"></i></a>
                            <?php }
                        for ($i = 1; $i <= $number_page; $i++) {
                            if ($i == $page) { ?>
                                <a href="?page=<?php echo $i  . "&category=" . $category ?>" class="this_page" id="this_page"> <?php echo $i ?></a>
                            <?php } else { ?>
                                <a href="?page=<?php echo $i  . "&category=" . $category ?>"> <?php echo $i ?> </a>
                            <?php }
                        }
                        if ($page < $number_page) { ?>
                            <a id="arrow_right" href="?page=<?php echo $page + 1 . "&category=" . $category ?>"><i class="fas fa-angle-double-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

        <?php } else { ?>
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
                <?php
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                $sql_number_of_product = "select count(*) from product ";
                $product_array = mysqli_query($connect, $sql_number_of_product);
                $product_array_result = mysqli_fetch_array($product_array);
                $number_of_product = $product_array_result['count(*)'];

                $product_in_page = 15;

                $number_page = ceil($number_of_product / $product_in_page);
                $skip = $product_in_page * ($page - 1);

                $sql_show_product = "select * from product 
                limit $product_in_page offset $skip";

                $show_product = mysqli_query($connect, $sql_show_product);
                ?>
                <div class="table">
                    <?php foreach ($show_product as $each) { ?>
                        <div class="thumbnail">
                            <div class="image">
                                <a href="product_detail.php?id=<?php echo $each['id'] ?>">
                                    <img class="img_thumb" src="admin/product/photos/<?php echo $each['img'] ?>">
                                </a>
                            </div>
                            <div class="caption">
                                <a href=""><?php echo $each['name'] ?></a>
                                <p class="price"><?php echo number_format($each['price'], 0, '', '.'); ?> đ</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="page">
                    <hr>
                    <div class="number">
                        <?php
                        if ($page > 1) { ?>
                            <a id="arrow_left" href="?page=<?php echo $page - 1 ?>"><i class="fas fa-angle-double-left"></i></a>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $number_page; $i++) {
                            if ($i == $page) { ?>
                                <a href="?page=<?php echo $i ?>" class="this_page" id="this_page">
                                    <?php echo $i ?>
                                </a>
                            <?php } else { ?>
                                <a href="?page=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                        <?php }
                        } ?>

                        <?php
                        if ($page < $number_page) { ?>
                            <a id="arrow_right" href="?page=<?php echo $page + 1 ?>"><i class="fas fa-angle-double-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Main end -->

    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>


</html>