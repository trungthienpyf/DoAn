<?php require 'menu_index_top.php'; ?>

<?php 
session_start();

if(isset($_SESSION['cart'])){
$cart=$_SESSION['cart'];
$key=1;
$sum=0;


?>
	<div class="title_product" style="padding-bottom: 15px; margin-left: -150px;"><h3>Giỏ hàng</h3></div>
	<?php foreach ($cart as $id => $each) { ?>
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
		
			<tr>
				<td><?php echo $key++ ?></td>

				<td><?php echo $each['name']?></td>
				<td><img width="200" src="admin/product/photos/<?php echo $each['img']?>" alt=""></td>
				<td><?php echo $each['price']?></td>
				<td> <a href="update_quantity.php?id=<?php echo $id ?>&type=decrease">-</a>
					<?php echo $each['quantity']?>
					<a href="update_quantity.php?id=<?php echo $id ?>&type=increase">+</a>
					</td>
					<td>
					<?php $result=$each['price'] * $each['quantity'];
						echo number_format($result, 0, '', ',');
						$sum+=$result;
						
					?> 
					vnđ
					</td>
				
				<td><a href="delete_product.php?id=<?php echo $id ?>">X</a></td>

			</tr>
	

	</table>

		<div><h5>Tổng tiền: <?php echo  number_format($sum, 0, '', ',');?> vnđ</h5></div>
	<?php } ?>
<?php  }?>


	


<?php require 'menu_index_bottom.php'?>