<?php require 'menu_index_top.php'; ?>
<div style="min-height: 600px; margin:0 40px;">
	<div class="title_product" style="padding-bottom: 15px; margin-left: 150px;">
		<h3>Giỏ hàng</h3>
	</div>

	<?php
	$sum = 0;
	if (isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
		$key = 1;
	?>
		<table border="1" width="100%">
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Hình ảnh</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Tiền</th>
				<th>Xóa</th>

			</tr>
			<?php foreach ($cart as $id => $each) {  ?>
				<tr>
					<td><?php echo $key++ ?></td>

					<td><?php echo $each['name'] ?></td>
					<td><img width="200" src="admin/product/photos/<?php echo $each['img'] ?>"></td>
					<td><?php echo   number_format($each['price'], 0, '', ',') ?></td>
					<td><a href="update_quantity.php?id=<?php echo $id ?>&type=decrease">-</a>
						<?php echo $each['quantity'] ?>
						<a href="update_quantity.php?id=<?php echo $id ?>&type=increase">+</a>
					</td>
					<td>
						<?php $result = $each['price'] * $each['quantity'];
						echo number_format($result, 0, '', ',');
						$sum += $result;
						?>
						vnđ
					</td>
					<td><a class="delete" href="delete_product.php?id=<?php echo $id ?>">X</a></td>
				</tr>
			<?php } ?>
		</table>


	<?php  } ?>

	<?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) { ?>
		<div>
			<h5 style="float:right;">Tổng tiền: <?php echo  number_format($sum, 0, '', ','); ?> vnđ</h5>
		</div>

		<?php
		if (isset($_SESSION['id'])) {

			$id = $_SESSION['id'];

			require 'admin/connect.php';
			$sql = "select * from customer where id ='$id'";
			$result = mysqli_query($connect, $sql);
			$each = mysqli_fetch_array($result);
		}
		?>
		<form style="padding-left: 60px;" action="process_checkout.php" method="post">
			<br>
			<br>
			Tên người nhận
			<input type="text" name="name" value="<?php echo $each['name'] ?>">
			<br>
			Số điện thoại người nhận
			<input type=" number" name="phone" value='<?php echo $each['phone'] ?>'>
			<br>
			Địa chỉ người nhận
			<input type="text" name="address" value='<?php echo $each['address'] ?>'>
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
<?php require 'menu_index_bottom.php' ?>