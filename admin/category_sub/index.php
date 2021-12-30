
<?php include '../menu_top.php'; ?>

<?php require '../connect.php';

$sql="select * from category_detail";
$result=mysqli_query($connect,$sql);
?>
		<a style="float:right;" href="form_insert.php">Thêm thể loại</a>
		<table border="1" width="100%">
			<tr>
				<th >id</th>
				<th >Tên</th>
				<!-- <th width="10%">Sửa</th>
				<th width="10%">Xóa</th> -->
			</tr>
			<?php foreach ($result as $key => $each) { ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $each['name']?></td>	
					<!-- <td><a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a></td>	
					<td><a href="process_delete.php?id=<?php echo $each['id']?>">Xóa</a></td>	 -->
				</tr>
			<?php } ?>
		</table>
<?php include '../menu_bottom.php'; ?>
