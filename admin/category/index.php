<?php require '../check_super_admin_login.php';?>

<?php include '../menu_top.php'; ?>

<?php require '../connect.php';

$sql="select * from category";
$result=mysqli_query($connect,$sql);
	
?>		<h2 style="padding: 10px 10px 10px 20px; display: inline-block; color: #0c2d68;" >Thể loại</h2>
		<br>
		<?php require '../check_error_success.php'; ?>
		<a class="create_title" href="form_insert.php">Thêm thể loại</a>
		<table border="1" width="100%">
			<tr>
				<th >ID</th>
				<th >Tên</th>
				<!-- <th width="10%">Sửa</th>
				<th width="10%">Xóa</th> -->
			</tr>
			<?php foreach ($result as $key => $each) { ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td style="text-align:center;"><?php echo $each['name']?></td>	
					<!-- <td><a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a></td>	
					<td><a href="process_delete.php?id=<?php echo $each['id']?>">Xóa</a></td>	 -->
				</tr>
			<?php } ?>
		</table>
<?php include '../menu_bottom.php'; ?>
