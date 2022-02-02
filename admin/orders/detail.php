<?php require '../check_admin_login.php';?>
<?php require'../menu_top.php'?>
<?php require '../connect.php'; 
if(empty($_GET['id'])){
	header('location:index.php?error=Hãy truyền mã');
	exit;
}
$id=$_GET['id'];

$sql="select * from orders where id='$id'";
$row=mysqli_query($connect,$sql);
$check_row=mysqli_num_rows($row);
if($check_row !==1){
	header('location:index.php?error=Hãy truyền mã');
	exit;
}


$sum=0;
$sql="select *
from detail_orders 
join product on product.id=detail_orders.product_id where orders_id='$id'";
$result=mysqli_query($connect,$sql);
?>	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Chi tiết đơn hàng</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th>Hình ảnh</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tiền</th>
		</tr>
		<?php foreach ($result as $id => $each) {  ?>
		<tr style="text-align:center;">
			<td><?php echo $id+1 ?></td>

			<td><?php echo $each['name']?></td>
			<td><img width="200" src="../product/photos/<?php echo $each['img']?>" alt=""></td>
			<td><?php echo $each['price']?></td>
			<td><?php echo $each['quantity']?></td>
			<td>
				<?php
					
				 $result=$each['price'] * $each['quantity'];
					echo number_format($result, 0, '', ',');
					$sum+=$result;
				?> 
				vnđ
				</td>
		</tr>
		<?php } ?>
		
	</table>
	<div style="padding-left:20px;">
		<a  style="color:#0c2d68; text-decoration: none;" href="index.php">
			<i class="fas fa-arrow-left"></i>
		    <span style="font-size: 24px;">Trở về trang trước</span>
		</a>
	</div>
	<p style="float: right;font-size:24px; padding-right: 40px;">
	Tổng tiền: <?php echo number_format($sum, 0, '', ',')?> VNĐ
	</p>

<?php require'../menu_bottom.php'?>
