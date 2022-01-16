<?php require '../check_admin_login.php';?>
<?php require'../menu_top.php'?>
<?php require '../connect.php'; 

$sql="select orders.*,customer.name,customer.phone,customer.address,LPAD(phone_receive, 10, '0') AS phone
from orders 
join customer on orders.customer_id=customer.id";
$result=mysqli_query($connect,$sql);
?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Đơn hàng</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>Thời gian đặt</th>
			<th>Thông tin người đặt</th>
			<th>Thông tin người nhận</th>
			<th>Trạng thái</th>
			<th>Tổng tiền</th>
			<th>Xem</th>
			<th>Duyệt</th>
		</tr>
		<?php foreach ($result as $id => $each) { ?>
			<tr style="text-align:center;">
				<td><?php echo $id+1?></td>
				<td><?php 
				$d=strtotime($each['time']);
				echo "Ngày: ". date("d-m-Y",$d) ."<br>";
				echo "Thời gian: " .date("h:i:s a",$d)
				?></td>
				<td>
					Tên: <?php echo $each['name']?>
					<br>
					Điện thoại: <?php echo $each['phone']?>
					<br>
					Địa chỉ: <?php echo $each['address']?>
				</td>
				<td>
					Tên: <?php echo $each['name_receive']?>
					<br>
					Điện thoại: <?php echo $each['phone_receive']?>
					<br>
					Địa chỉ: <?php echo $each['address_receive']?>
				</td>
				<td>
					<?php switch ($each['status']) {
						case '0':
							echo "Mới đặt";
							break;
						case '1':
							echo "Đã đặt";
							break;
						case '2':
							echo "Đã hủy";
							break;	
					} ?>
				</td>
				<td>
					<?php echo number_format($each['total_price'], 0, '', '.')?> VNĐ 
				</td>
				<td>
					<a class="alter_style" href="detail.php?id=<?php echo $each['id']?>">Xem</a>
				</td>
				<?php if($each['status']==0){?>
				<td>
					<a  class="alter_style" href="update.php?id=<?php echo $each['id']?>&status=1">Duyệt</a>
					<br>
					<a class="alter_style" href="update.php?id=<?php echo $each['id']?>&status=2">Hủy</a>
				</td>
					
				<?php }else{  ?>
				<td>
						<span style="color:rgb(120, 120, 120);">Duyệt</span>
					<br>
						<span style="color:rgb(120, 120, 120);">Hủy</span>
				</td>
				<?php } ?>
			</tr>
		<?php } ?>
		
	</table>


<?php require'../menu_bottom.php'?>
