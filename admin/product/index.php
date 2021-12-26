<?php require'../menu_top.php'?>
<?php require '../connect.php';

$sql="select * from product";
$result=mysqli_query($connect,$sql);



?>
	<a style="float:right;" href="form_insert.php">Thêm sản phẩm</a>
	<table border="1" width="100%">
		<tr>
		<th >id</th>
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
				<td><?php echo $each['price'] ?> đ</td> 
				<td>
					<a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
				</td> 
			 	<td>
					<a href="process_delete.php?id=<?php echo $each['id']?>">Xóa</a>
				</td> 
			</tr>
		<?php } ?> 
		
	</table>
<?php require'../menu_bottom.php'?>