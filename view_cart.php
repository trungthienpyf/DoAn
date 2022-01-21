<?php require 'menu_index_top.php'; ?>
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
				<th style="width: 5%;">ID</th>
				<th style="width: 25%;">Tên</th>
				<th style="width: 15%;">Hình ảnh</th>
				<th style="width: 15%;">Giá</th>
				<th style="width: 15%;">Số lượng</th>
				<th style="width: 15%;">Tiền</th>
				<th style="width: 10%;">Xóa</th>
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
			<h5 style="float:right;">Tổng tiền: <span id="span-total"><?php echo  $total; ?></span> vnđ</h5>
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
		<form style="padding-left: 60px;" action="process_checkout.php" method="post">
			<br>
			<br>
			Tên người nhận
			<input type="text" name="name" value="<?php echo $name ?>">
			<br>
			Số điện thoại người nhận
			<input type="number" name="phone" value='<?php echo $phone ?>'>
			<br>
			Địa chỉ người nhận
			<input type="text" name="address" value='<?php echo $address ?>'>
			<br>
			Ghi chú
			<br>
			<textarea name="note"></textarea>
			<br>
			<?php if (isset($_GET['error'])) { ?>
				<span style="color:red;"><?php echo $_GET['error'] ?></span>
			<?php } ?>
			<button style="margin:0">Đặt hàng</button>
		</form>
	<?php  } else { ?>
		<h3 style="text-align:center">Giỏ hàng của bạn đang rỗng</h3>
	<?php } ?>
	<?php if (isset($_GET['success'])) { ?>
		<h3 style="color:green; text-align: center;"><?php echo $_GET['success'] ?></h3>
	<?php } ?>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
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
	});
</script>
<?php require 'menu_index_bottom.php' ?>