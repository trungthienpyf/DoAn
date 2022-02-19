<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/view_cart.css">
	<script src="https://kit.fontawesome.com/19302221dc.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title>Giỏ hàng</title>
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

	<div class="main">
		<div style="min-height: 600px; margin:0 40px;">
			<div class="title_product" style="padding-bottom: 15px; margin-left: 150px;">
				<h3>Giỏ hàng</h3>
			</div>
			<?php
			$total = 0;
			if (isset($_SESSION['cart'])) {
				$cart = $_SESSION['cart'];
				$key = 1;
			?>
				<table border="1" width="100%">
					<tr>
						<th style="width: 5%;text-align: center;">ID</th>
						<th style="width: 25%;text-align: center;">Tên</th>
						<th style="width: 15%;text-align: center;">Hình ảnh</th>
						<th style="width: 15%;text-align: center;">Giá</th>
						<th style="width: 15%;text-align: center;">Số lượng</th>
						<th style="width: 15%;text-align: center;">Tiền</th>
						<th style="width: 10%;text-align: center;">Xóa</th>
					</tr>
					<?php foreach ($cart as $id => $each) {
						foreach ($each as $size => $each2) {  ?>
							<tr>
								<td><?php echo $key++ ?></td>
								<td>
									<a href="product_detail.php?id=<?php echo $id ?>" class="none">
										<?php echo $each2['name'];
										if ($size) {
											echo  ' - ' . $size;
										}
										?>
									</a>
								</td>
								<td>
									<a href="product_detail.php?id=<?php echo $id ?>" class="none">
										<img width="200" src="admin/product/photos/<?php echo $each2['img'] ?>">
									</a>
								</td>
								<td><span class="span-price"><?php echo   $each2['price'] ?></span></td>
								<td>
									<div style="line-height: 20px; width: 60px;height: 20px;margin: 0 auto;">
										<button style="float: left;" class="btn-quantity_in_cart mini" data-type="0" data-id="<?php echo $id ?>" data-size="<?php echo $size ?>">-</button>
										<span style=" width: 20px;float: left;" class="span-quantity"><?php echo $each2['quantity'] ?></span>
										<button style="float: right;" class="btn-quantity_in_cart mini" data-type="1" data-id="<?php echo $id ?>" data-size="<?php echo $size ?>">+</button>
									</div>
								</td>
								<td>
									<span class="span-sum">
										<?php $sum = $each2['price'] * $each2['quantity'];
										echo $sum;
										$total += $sum;
										?>
									</span>vnđ
								</td>
								<td><button class="delete btn-delete" data-id="<?php echo $id ?>" data-size="<?php echo $size ?>" data-name="<?php echo $each2['name'] ?>">X</button></td>
							</tr>
						<?php } ?>
					<?php } ?>
				</table>

				<div>
					<h5 style="float:right;">Tổng tiền: <span id="span-total" class="number_format"><?php echo  $total; ?></span> vnđ</h5>
				</div>

				<?php
				if (isset($_SESSION['id'])) {
					$id = $_SESSION['id'];
					require 'admin/connect.php';
					$sql = "select * from customer where id ='$id'";
					$result = mysqli_query($connect, $sql);
					$each = mysqli_fetch_array($result);
					$name = $each['name'];
					$phone = $each['phone'];
					$address = $each['address'];
				} else {
					$name = "";
					$phone = "";
					$address = "";
				}
				?>
				<form style="padding-left: 60px;" method="post" id="form-order">
					<table>
						<tr>
							<td class="col">Tên người nhận</td>
							<td>
								<input type="text" name="name" value="<?php echo $name ?>">
							</td>
						</tr>
						<tr>
							<td class="col">Số điện thoại người nhận</td>
							<td>
								<input type="text" name="phone" value='<?php echo $phone ?>'>
							</td>
						</tr>
						<tr>
							<td class="col">Địa chỉ người nhận</td>
							<td>
								<input type="text" name="address" value='<?php echo $address ?>'>
							</td>
						</tr>
						<tr>
							<td class="col">Ghi chú </td>
							<td> <textarea name="note"></textarea></td>
						</tr>
					</table>
					<span style="color:red;" id="error_order"></span>
					<button style="margin:0">Đặt hàng</button>
				</form>
			<?php  } else { ?>
				<h3 style="text-align:center">Giỏ hàng của bạn đang rỗng</h3>
			<?php } ?>
		</div>
	</div>
	<?php include 'signup-modal.php' ?>
	<?php include 'signin-modal.php' ?>
	<!-- Main end -->

	<!-- Footer start -->
	<?php include 'footer.php' ?>
	<!-- Footer end -->
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="assets/js/login.js"></script>
<script>
	$(document).ready(function() {
		//edit quantity
		$(".btn-quantity_in_cart").click(function() {
			let btn = $(this);
			let id = btn.data('id');
			let type = parseInt(btn.data('type'));
			let size = btn.data('size');
			$.ajax({
					type: "POST",
					url: "update_quantity.php",
					data: {
						id,
						type,
						size
					}
				})
				.done(function() {
					let parent_tr = btn.parents('tr');
					let price = parent_tr.find('.span-price').text();
					let quantity = parent_tr.find('.span-quantity').text();
					if (type == 1) {
						quantity++;
					} else {
						quantity--;
					}
					if (quantity == 0) {
						parent_tr.remove();
					} else {
						parent_tr.find('.span-quantity').text(quantity);
						let sum = price * quantity;
						parent_tr.find('.span-sum').text(sum);
					}
					let total = 0;
					$(".span-sum").each(function() {
						total += parseFloat($(this).text());
					})
					$('#span-total').text(total);
				})
		});

		$(".btn-delete").click(function() {
			let btn = $(this);
			let name = btn.data('name');
			if (confirm("Bạn chắc chắn muốn xóa " + name + " ?")) {
				let id = btn.data('id');
				let size = btn.data('size');
				$.ajax({
						type: "POST",
						url: "delete_product.php",
						data: {
							id,
							size
						}
					})
					.done(function() {
						btn.parents('tr').remove();
					})
			};
		});

		$("#btn-signup-link").click(function() {
			$('#signin_modal').modal('hide');
			$("#signup_modal").modal();
		});

		$("#btn-signin-link").click(function() {
			$("#signup_modal").modal('hide');
			$('#signin_modal').modal();
		});

		$('#form-order').submit(function(event) {
			event.preventDefault();
			if (<?php echo $_SESSION['id'] ?? "''" ?> === '') {
				console.log("hoho");
				$("#signin_modal").modal();
			} else {
				$.ajax({
						type: "POST",
						url: "process_checkout.php",
						data: $("#form-order").serializeArray(),
						dataType: "html",
					})
					.done(function(response) {
						if (response === '1') {
							alert("Đặt hàng thành công!");
							location.reload();
						} else {
							$("#error_order").text(response);
							$("#error_order").show();
						}
					});
			}
		});

		$('#form-signin').submit(function(event) {
			event.preventDefault();
			if (check_sign_in() != false) {
				$.ajax({
						type: "POST",
						url: "process_signin.php",
						data: $("#form-signin").serializeArray(),
						dataType: "html",
					})
					.done(function(response) {
						if (response !== '1') {
							$("#div-error-signin").text(response);
							$("#div-error-signin").show();
						} else {
							location.reload();
						}
					});
			}
		});
		$('#form-signup').submit(function(event) {
			event.preventDefault();
			if (check_sign_up() != false) {
				$.ajax({
						type: "POST",
						url: "process_signup.php",
						data: $("#form-signup").serializeArray(),
						dataType: "html",
					})
					.done(function(response) {
						if (response === 'error') {
							$("#div-error-signup").text("Email đã được sử dụng");
							$("#div-error-signup").show();
						} else {
							alert("Đăng kí thành công!")
							location.reload();
						}
					});
			}
		});

	});
</script>

</html>