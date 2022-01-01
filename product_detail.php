<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end-->
<?php
$id = $_GET['id'];
$sql = "select * from product where id = $id";
$result_sql = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($result_sql, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/product_detail.css">
	<script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
	<title><?php echo $result['name'] ?> </title>
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
				$id_category_detail = $result['category_detail_id'];
				$sql_category_detail = "select * from category_detail where id = $id_category_detail";
				$result_sql_category_detail = mysqli_query($connect, $sql_category_detail);
				$result_category_detail = mysqli_fetch_array($result_sql_category_detail, MYSQLI_ASSOC);

				$id_category = $result_category_detail['category_id'];
				$sql_category = "select * from category where id = $id_category";
				$result_sql_category = mysqli_query($connect, $sql_category);
				$result_category = mysqli_fetch_array($result_sql_category, MYSQLI_ASSOC);
				?>
				<li class="space">
					<a href=""><?php echo $result_category['name'] ?> </a>
				</li>
				<li class="space">
					<a href=""> <?php echo $result_category_detail['name'] ?> </a>
				</li>
				<li>
					<p class="name_bread"><?php echo $result['name'] ?></p>
				</li>
			</ol>
		</div>

		<div class="product_detail">
			<div class="image_product">
				<img src=" admin/product/photos/<?php echo $result['img'] ?>" alt="">
			</div>
			<div class="content">
				<div class="title">
					<h2><?php echo $result['name'] ?></h2>
				</div>
				<div class="price">
					<p class="price_word"><?php echo number_format($result['price'], 0, '', '.');  ?> ₫</p>
				</div>
				<div class="button">
					<a href="add_cart.php?id=<?php echo $result['id']?>" class="add_cart"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng </a>
					<a href="">Mua ngay</a>
				</div>
				<div class="description">
					<h6>Thông tin sản phẩm:</h6>
					<p>
						<?php echo $result['description'] ?>
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

				$sql_other = "select * from product where id != $id limit 5";
				$result_other = mysqli_query($connect, $sql_other);
				?>
				<ul>
					<?php foreach ($result_other as $each) { ?>
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