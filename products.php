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
    <?php require 'header.php'; ?>
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
        <div class="products">
            <div class="header_product">
                <div class="title_product">
                    <?php
                    if (isset($_GET['category'])) {
                        $category = $_GET['category'];
                        $title = $category;
                    } else {
                        $title = "Tất cả sản phẩm";
                    }
                    ?>
                    <h3><?php echo $title ?></h3>
                </div>
                <div class="sort_product">
                    <div class="sort">
                        <p style=" border: #1d3557 1px solid;display:block; width:130px ;text-align: center;">Sắp xếp<i class="fas fa-caret-down"></i> </p>
                    </div>
                    <div class="sub_menu">
                        <?php
                        if (isset($_GET['category'])) {
                            $url_category = "&category=$category";
                        } else {
                            $url_category = "";
                        }
                        ?>
                        <ul>
                            <li>
                                <a href="<?php echo "?sort=new" . $url_category ?>">Sản phẩm mới</a>
                            </li>
                            <li>
                                <a href="<?php echo "?sort=low" . $url_category ?>">Từ thấp đến cao</a>
                            </li>
                            <li>
                                <a href="<?php echo "?sort=high" . $url_category ?>">Từ cao xuống thấp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
            $sql_category_text = "";
            $sql_sort_text = "";
            if (isset($_GET['category'])) {
                $sql_category_text = "where category_detail.name = '$category'";
            }
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
                switch ($sort) {
                    case 'new':
                        $sql_sort_text =  "ORDER BY id DESC";
                        break;
                    case 'low':
                        $sql_sort_text =  "ORDER BY price ASC";
                        break;
                    case 'high':
                        $sql_sort_text =  "ORDER BY price DESC";
                        break;
                    default:
                        break;
                }
            }
            $sql_number_of_product = "select count(*) from product
            join category_detail on product.category_detail_id = category_detail.id $sql_category_text ";
            $product_array = mysqli_query($connect, $sql_number_of_product);
            $product_array_result = mysqli_fetch_array($product_array);
            $number_of_product = $product_array_result['count(*)'];

            $product_in_page = 12;

            $number_page = ceil($number_of_product / $product_in_page);
            $skip = $product_in_page * ($page - 1);

            $sql_show_product = "select product.*, category.name as cate 
            from product
            join category_detail on product.category_detail_id = category_detail.id
            JOIN category ON category_detail.category_id = category.id
            $sql_category_text  $sql_sort_text
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
                    $url_sort = "";
                    if (isset($_GET['sort'])) {
                        $url_sort = "sort=$sort&";
                    }
                    if ($page > 1) { ?>
                        <?php $page_prv =  $page - 1 ?>
                        <a id="arrow_left" href="<?php echo "?" . $url_sort . "page=" . $page_prv . $url_category ?>"><i class="fas fa-angle-double-left"></i></a>
                        <?php }
                    for ($i = 1; $i <= $number_page; $i++) {
                        if ($i == $page) { ?>
                            <a href="<?php echo "?" . $url_sort . "page=" . $i . $url_category ?>" class="this_page" id="this_page"> <?php echo $i ?></a>
                        <?php } else { ?>
                            <a href="<?php echo "?" . $url_sort . "page=" . $i . $url_category ?>"> <?php echo $i ?> </a>
                        <?php }
                    }
                    if ($page < $number_page) { ?>
                        <?php $page_nxt =  $page + 1 ?>
                        <a id="arrow_right" href="<?php echo "?" . $url_sort . "page=" . $page_nxt . $url_category ?>"><i class="fas fa-angle-double-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main end -->

    <!-- Footer start -->
    <?php include 'footer.php' ?>
    <!-- Footer end -->
</body>

</html>