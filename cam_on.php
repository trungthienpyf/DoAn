<?php 
require 'admin/connect.php';
session_start();
if (isset($_SESSION['id'])) {
	$customer_id = $_SESSION['id'];
} else {
	$customer_id = 18;
}

if(isset($_GET['resultCode']) && $_GET['resultCode']==0 ){
	if(isset($_GET['partnerCode'])){
	$_SESSION['p'];
	$_SESSION['n'];
	$_SESSION['a'];
	$_SESSION['te'];
	$cart = $_SESSION['cart'];

	$partnerCode=$_GET['partnerCode'];
	$orderId=$_GET['orderId'];

	$amount=$_GET['amount'];
	$orderInfo=$_GET['orderInfo'];
	$orderType=$_GET['orderType'];
	$transId=$_GET['transId'];

	$payType=$_GET['payType'];

		$phone_receive=$_SESSION['p'];
	$name_receive=$_SESSION['n'];
	$address_receive=$_SESSION['a'];
	$note=$_SESSION['te'];

	$code_cart=rand(1,100000);
	$sql = "insert into momo(partner_code, order_id, amount, order_info, order_type, trans_id, pay_type,code_cart) 
	values('$partnerCode', '$orderId', '$amount', '$orderInfo', '$orderType', '$transId', '$payType','$code_cart')";
	mysqli_query($connect, $sql);

	$status = 0;


	$sql = "insert into orders(name_receive, phone_receive, address_receive, note, status, customer_id, total_price,code_cart,cart_payment) 
	values('$name_receive', '$phone_receive', '$address_receive', '$note', '$status', '$customer_id', '$amount','$code_cart','momo')";
	mysqli_query($connect, $sql);

	$sql = "select max(id) from orders where customer_id='$customer_id'";
	$result = mysqli_query($connect, $sql);

	$orders_id = mysqli_fetch_array($result)['max(id)'];
	$quantity = 0;
	foreach ($cart as $product_id => $id) {
		foreach ($id as $size => $each) {
			$quantity = $each['quantity'];
			$sql = "insert into detail_orders(orders_id, product_id, quantity,size) 
		values('$orders_id','$product_id','$quantity','$size')";
			mysqli_query($connect, $sql);
		}
	}
	unset($_SESSION['cart'],$_SESSION['p'],$_SESSION['n'],$_SESSION['a'],$_SESSION['te']);
	}

}else{
	header('Location:view_cart.php' );
}

	
	


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
	<title>Cảm ơn</title>
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

				<h3>Cảm ơn</h3>
				<!-- <h3>Giỏ hàng</h3> -->
			</div>

				<h3 style="text-align:center">Đặt hàng thành công!</h3>
				<h3 style="text-align:center">Cảm ơn bạn đã tin tưởng sản phẩm chúng tôi!</h3>
			
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