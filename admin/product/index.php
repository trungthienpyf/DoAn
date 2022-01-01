<?php require '../check_admin_login.php';?>


<?php require'../menu_top.php'?>
<?php require '../connect.php';

$sql="select * from product";
$result=mysqli_query($connect,$sql);



?>
	<a class="create_title" href="form_insert.php">Thêm sản phẩm</a>
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
			<tr>
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