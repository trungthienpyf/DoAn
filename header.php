<?php require 'admin/connect.php'; ?>

<link rel="stylesheet" href="assets/css/header.css">
<header>
    <nav class="header">

        <input type="checkbox" name="" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>

        <div class="logo">
            <a href="index.php">Logo</a>
        </div>

        <div class="menu">
            <ul class="ul_1">
                <li>
                    <a href="index.php">Trang chủ </a>
                </li>
                <li>
                    <a href="products.php">Cửa hàng</a>
                </li>
                <li>
                    <a href="products.php">Áo <i class="fas fa-caret-down"></i></a>
                    <div class="sub_menu">
                        <?php
                        $sql_category = "select * from category_detail where category_id=1";
                        $result_category = mysqli_query($connect, $sql_category);
                        ?>
                        <ul>
                            <?php foreach ($result_category as $each) { ?>
                                <li><a href=""><?php echo $each['name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="products.php">Quần <i class="fas fa-caret-down"></i></a>
                    <div class="sub_menu">
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
                </li>
                <li>
                    <a href="products.php">Phụ kiện <i class="fas fa-caret-down"></i></a>
                    <div class="sub_menu">
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
                </li>

            </ul>

        </div>
        <div class="icon">
            <a href="view_cart.php"><i class="fas fa-shopping-cart"></i></a>
            <a href=""><i class="fas fa-user"></i></a>
        </div>
    </nav>
</header>