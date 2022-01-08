<?php require '../check_admin_login.php';?>
<?php require'../menu_top.php'?>
<?php require '../connect.php';

$tim_kiem='';
if(isset($_GET['search'])){
	$tim_kiem=$_GET['search'];
}
$sql="select * from product where name like '%$tim_kiem%' 
or description like '%$tim_kiem%' 
";
$result=mysqli_query($connect,$sql);

?>	
	
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Sản phẩm</h2>
	<a class="create_title" href="form_insert.php">Thêm sản phẩm</a>
	<div style="padding: 10px 10px;">

		<form action="">
			<span style="font-size: 24px;">Tìm kiếm</span>
		<input style="margin: 0 0 0 16px;" type="search" name="search" value="<?php echo $tim_kiem?>" placeholder="Tìm kiếm sản phẩm">
	</form></div>
	<table border="1" width="100%">
		<tr>
		<th >ID</th>
		<th >Tên</th>
		<th >Mô tả</th>
		<th >Ảnh</th>
		<th >Giá</th>
		<th >Sửa</th>
		<th >Xóa</th>
		</tr>
		<?php foreach ($result as $key => $each) { ?>
			<tr style="text-align:center;">
				<td><?php echo $key+1 ?></td>
				<td><?php echo $each['name'] ?></td> 
				<td><?php echo $each['description'] ?></td> 
				<td>
					<img width="80" src="photos/<?php echo $each['img'] ?>" alt="">
				</td> 
				<td><?php echo number_format($each['price'] , 0, '', ','); ?> đ</td> 
				<td >
					<a class="delete_style" href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
				</td> 
			 	<td>
					<a class="delete_style" href="process_delete.php?id=<?php echo $each['id']?>">Xóa</a>
				</td> 
			</tr>
		<?php } ?> 
		
	</table>
<?php require'../menu_bottom.php'?>