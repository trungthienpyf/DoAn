
<?php require 'admin/connect.php';

$sql="select * from category ";

$result_category=mysqli_query($connect,$sql);

?>

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

                <?php  foreach ($result_category as $key => $each) {?>
                   
                
                <li>
                    <a href="products_category.php?id=<?php echo $each['id']?>"><?php echo $each['name']?></a>
                    <div class="sub_menu">
                        <ul>
                            <li> <a href="">Áo thun</a></li>
                            <li><a href="">Jacket</a></li>
                            <li><a href="">Hoodie</a></li>
                            <li><a href="">Somi</a></li>
                        </ul>
                    </div>
                </li>
                 <?php }?>
                
            </ul>

        </div>
        <div class="icon">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <a href=""><i class="fas fa-user"></i></a>
        </div>
    </nav>
</header>