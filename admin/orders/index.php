 <?php require '../check_admin_login.php';?>
<?php require'../menu_top.php'?>
<?php require '../connect.php'; 

$search='';
if(isset($_GET['search'])){
	$search=$_GET['search'];
}
$count_orders="select count(*) from orders join customer on orders.customer_id=customer.id
where  phone like '%$search%' or name like '%$search%'
or customer.phone like '%$search%' or customer.name like '%$search%'
ORDER BY orders.time desc";
$array_orders=mysqli_query($connect,$count_orders);
$result_orders=mysqli_fetch_array($array_orders);
$number_orders=$result_orders['count(*)'];
$orders_number_in_page=10;

$page=ceil($number_orders/$orders_number_in_page);



$get_page=1;
if(isset($_GET['page'])){
	$get_page=$_GET['page'];
}
$passed=$orders_number_in_page*($get_page-1);

$sql="select orders.*,customer.name,customer.phone,customer.address,LPAD(phone_receive, 10, '0') AS phone
from orders   
join customer on orders.customer_id=customer.id
where  phone like '%$search%' or name like '%$search%'
or customer.phone like '%$search%' or customer.name like '%$search%' 
ORDER BY orders.time desc

limit $orders_number_in_page offset $passed
";
$result=mysqli_query($connect,$sql);
?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Đơn hàng</h2>

	<div style="padding: 10px 20px;">
		<form action="">
			<span style="font-size: 24px; ">Tìm kiếm</span>
		<input style="margin: 0 0 0 16px; width: 300px; height: 30px;"  type="search" name="search"
		value="<?php echo $search?>"  placeholder="Tìm kiếm đơn hàng theo tên, điện thoại">

	</form></div>
	<?php require '../check_error_success.php'; ?>
	</form>
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
							echo "Đã duyệt";
							break;
						case '2':
							echo "Đã hủy";
							break;	

							default: break; 
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
<div class="pagination">
	<?php if($get_page>1){ 
		$back=$get_page-1; ?>	
		<a href="?page=<?php echo $back ?>&search=<?php echo $search?>"><</a>
		<?php } ?> 
		<?php for($i=1;$i<=$page;$i++){ ?>

			<a href="?page=<?php echo $i?>&search=<?php echo $search?>">
				<?php echo $i?>
				</a>
		<?php } ?>
		
		<?php if($get_page<$page){ 
			$next=$get_page+1; ?>
		<a href="?page=<?php echo $next ?>&search=<?php echo $search?>">></a>
		<?php } ?>
</div>

<?php require'../menu_bottom.php'?>
