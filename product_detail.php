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
	<link rel="stylesheet" href="assets/css/product_detail.css">
	<script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
	<title><?php
			$id = $_GET['id'];
			$sql = "select * from product where id = $id";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);
			echo $each['name'] ?> </title>
</head>

<body>
	<!-- Header start -->
	<?php
	require 'header.php';
	?>
	<!-- Header end -->

	<!-- Main start -->
	<div class="main_product_detail">
		<div class="breadcrumbs">
			<ol>
				<?php
				$id = $_GET['id'];
				$sql = "select product.*,category_detail.name as cate_detail, category.name AS cate
				from product
				join category_detail on product.category_detail_id = category_detail.id
                join category on category_detail.category_id = category.id
				where product.id = '$id'";
				$result = mysqli_query($connect, $sql);
				$each = mysqli_fetch_array($result);
				?>
				<li class="space">
					<a href=""><?php echo $each['cate'] ?> </a>
				</li>
				<li class="space">
					<a href=""> <?php echo $each['cate_detail'] ?> </a>
				</li>
				<li>
					<p class="name_bread"><?php echo $each['name'] ?></p>
				</li>
			</ol>
		</div>

		<div class="product_detail">
			<div class="image_product">
				<img src=" admin/product/photos/<?php echo $each['img'] ?>" alt="">
			</div>
			<div class="content">
				<div class="title">
					<h2><?php echo $each['name'] ?></h2>
				</div>
				<div class="price">
					<p class="price_word"><?php echo number_format($each['price'], 0, '', '.');  ?> ₫</p>
				</div>
				<div class="button">
					<a href="add_cart.php?id=<?php echo $each['id'] ?>" class="add_cart"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng </a>
					<a href="view_cart.php">Mua ngay</a>
				</div>
				<div class="description">
					<h6>Thông tin sản phẩm:</h6>
					<p>
						<?php echo $each['description'] ?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="other_product">
		<link rel="stylesheet" href="assets/css/index.css">
		<div class="main">
			<div class="main_001">
				<h4>Sản phẩm khác</h4>
				<?php
				$sql  = "select * from product where id != $id 
				ORDER BY RAND()
				LIMIT 5";
				$result  = mysqli_query($connect, $sql);
				?>
				<ul>
					<?php foreach ($result  as $each) { ?>
						<li>
							<a href="product_detail.php?id=<?php echo $each['id'] ?>">
								<img src="admin/product/photos/<?php echo $each['img'] ?>">
							</a>
							<a href="product_detail.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
							<p> <?php echo number_format($each['price'], 0, '', '.'); ?> ₫</p>

						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- Main end -->

	<!-- Footer start -->
	<?php include 'footer.php' ?>
	<!-- Footer end -->
</body>

</html>