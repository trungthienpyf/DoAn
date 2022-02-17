<!-- Connect start -->
<?php require 'admin/connect.php'; ?>
<!-- Connect end-->
<?php
$id = $_GET['id'];
$sql = "select * FROM product where id = '$id'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) == 0) {
	header('location:404.html');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/product_detail.css">
	<link rel="stylesheet" href="assets/css/rating_disable.css">
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
					<a href="products.php?category=<?php echo $each['cate'] ?> "><?php echo $each['cate'] ?> </a>
				</li>
				<li class="space">
					<a href="products.php?category=<?php echo $each['cate_detail'] ?>"> <?php echo $each['cate_detail'] ?> </a>
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
				<form>
					<input type="hidden" id="id" value="<?php echo $each['id'] ?>">
					<?php if ($each['cate'] !== "Phụ kiện") { ?>
						<select id="size" name="size">
							<option value="S">S</option>
							<option value="M">M</option>
							<option value="L">L</option>
						</select>
					<?php } ?>

					<div class="button">
						<button id="form_insert" class="add_cart_new"><i class="fas fa-shopping-cart" style="color: #fff;"></i> Thêm vào giỏ hàng </button>
						<button id="btn_buy" class="add_cart_new"> Mua ngay</button>
					</div>
				</form>

				<div class="description">
					<h6>Thông tin sản phẩm:</h6>
					<p>
						<?php echo $each['description'] ?>
					</p>
					<h6>Đánh giá của khách hàng</h6>


					<?php
					$sql = "SELECT * FROM comment_product
					WHERE product_id='$id'";
					$result = mysqli_query($connect, $sql);
					if (mysqli_num_rows($result) == 0) { ?>
						<div>
							<p>Chưa có đánh giá</p>
						</div>
					<?php
					} else {
					?>
						<div>
							<div style="display: flex; align-items: center;">
								<span class="star-cb-group">
									<input type="radio" id="rating-5" name="rating" value="5" disabled /><label for="rating-5">5</label>
									<input type="radio" id="rating-4" name="rating" value="4" disabled /><label for="rating-4">4</label>
									<input type="radio" id="rating-3" name="rating" value="3" disabled /><label for="rating-3">3</label>
									<input type="radio" id="rating-2" name="rating" value="2" disabled /><label for="rating-2">2</label>
									<input type="radio" id="rating-1" name="rating" value="1" disabled /><label for="rating-1">1</label>
								</span>
								<p style="font-size: 16px;" id="star_text"></p>
							</div>
							<div id="comment" style=" border: #a8dadc 1px solid; padding: 10px 0;">

							</div>
						</div>
					<?php } ?>
				</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	function ReplaceSelectWithButtons(selectField) {
		// get the basics
		var selectValue = selectField.val();
		var selectId = selectField.attr('id')

		// get all options and create buttons
		$(selectField).find('option').each(function() {
			if ($(this).val()) {
				var btn = $('<div data-value="' + $(this).val() + '" data-target="' + selectId + '" class="selectbtn">' + $(this).text() + '</div>');
				if ($(this).val() == selectValue) {
					btn.addClass('selected');
				}
				btn.insertBefore(selectField);
			}
		});
		// hide the select field
		selectField.hide();
		// map click event to buttons
		$(document).on('click', '.selectbtn', function() {
			var target = $(this).data('target');
			$('.selectbtn[data-target="' + target + '"]').removeClass('selected');
			$(this).addClass('selected');

			// deselect everything, select the selected 
			var selectorAll = '#' + target + ' option';
			$(selectorAll).removeAttr('selected');
			var selectorSingle = '#' + target + ' option[value="' + $(this).data('value') + '"]';
			$(selectorSingle).attr('selected', 'selected');
			$(selectorSingle).change();

		});
	}
	// change selects
	ReplaceSelectWithButtons($('#size'));

	$("#form_insert").click(function(e) {
		e.preventDefault();
		let id = $('#id').val();
		let size = $('#size').val();
		if (size === "") {
			size = "null"
		}
		$.ajax({
				url: 'add_cart.php',
				type: 'post',
				dataType: 'html',
				data: {
					id: id,
					size: size
				},
			})
			.done(function(response) {
				if (response == 1) {
					alert('Đã thêm vào giỏ hàng')
				} else {
					alert(response)
				}
			})
	});

	$(document).ready(function() {
		$("#btn_buy").click(function(e) {
			e.preventDefault();
			let id = $('#id').val();
			let size = $('#size').val();
			if (size === "") {
				size = "null"
			}
			$.ajax({
					url: 'add_cart.php',
					type: 'post',
					dataType: 'html',
					data: {
						id: id,
						size: size
					},
				})
				.done(function(response) {
					if (response == 1) {
						window.location.assign("view_cart.php");
					} else {
						alert(response);
					}
				})
		});

		<?php
		$sql = "SELECT AVG(star)
		FROM comment_product
		WHERE product_id='$id'";
		$result = mysqli_query($connect, $sql);
		$result = mysqli_fetch_array($result);
		$quantity = intval($result[0]);
		$quantity_float = floatval($result[0]);
		$star_number = ceil($quantity);
		if (isset($star_number)) {
		?>
			$("#star_text").text(" <?php echo number_format($quantity_float, 1) ?>/5");
			switch (<?php echo $star_number ?>) {
				case 1:
					$("input[name='rating'][value='1']").prop("checked", true);
					break;
				case 2:
					$("input[name='rating'][value='2']").prop("checked", true);
					break;
				case 3:
					$("input[name='rating'][value='3']").prop("checked", true);
					break;
				case 4:
					$("input[name='rating'][value='4']").prop("checked", true);
					break;
				case 5:
					$("input[name='rating'][value='5']").prop("checked", true);
					break;
				default:
					break;
			}
		<?php
		}
		?>

		load_data(page = 1, id = <?php echo $id ?>);

		function load_data(page, id) {

			$.ajax({
				url: "page_comment.php",
				method: "POST",
				data: {
					page: page,
					id: id
				},
				success: function(data) {
					$('#comment').html(data);
				}
			})
		}
		$(document).on('click', '.pagination_link', function() {
			var page = $(this).attr("id");
			load_data(page, id);
		});
	});
</script>

</html>