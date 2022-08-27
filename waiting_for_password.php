<?php 
require 'admin/connect.php';



?>



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
	<title>Quên mật khẩu</title>
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
	require 'header_no_ss.php';
	?>
	<!-- Header end -->


	<!-- Main start -->
<div class="main">
		<div style="min-height: 600px; margin:0 40px;">
			<div class="title_product" style="padding-bottom: 15px; margin-left: 150px;">
				<h3>Quên mật khẩu</h3>
			</div>

				<h3 style="text-align:center">Vui lòng xác nhận mật khẩu qua gmail</h3>

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