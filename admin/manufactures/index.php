
<?php include'../menu_top.php'; ?>
	
	<a style="float: right;" href="form_insert.php">Thêm nhà sản xuất</a>
	

<?php 

require '../connect.php'; 

$sql="select * from manufacturers";
$result=mysqli_query($connect,$sql);	

?>
	<table border="1" width="100%">
		<tr>
			<th width="40%">id</th>
			<th width="40%">tên</th>
			<th width="10%">Sửa</th>
			<th width="10%">Xóa</th>
		</tr>
		<?php foreach ($result as $key => $each) {?>
		<tr>
			<td><?php echo  $key+1  ?></td>
			<td><?php echo $each['name'] ?></td>
			<td>
				<a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
			</td>
			<td>
				<a href="process_delete.php?id=<?php echo $each['id']?>">Xóa</a>
			</td>
		</tr>
		<?php } ?>
	
	</table>
<?php include'../menu_bottom.php'; ?>
	
