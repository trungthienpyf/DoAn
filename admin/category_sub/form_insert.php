<?php require '../check_super_admin_login.php';?>



	<?php include '../menu_top.php' ?>
	<?php include '../connect.php';

	$sql="select * from category";
	$result=mysqli_query($connect,$sql);
	?>
		<form action="process_insert.php" method="post">
			Tên thể loại phụ
			<input type="text" name="name">
			<br>
			Thể loại
			<select name="category_id">
				<?php foreach ($result as $key => $each) { ?>
					<option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
				<?php } ?>
				
			</select>
			<br>
			<button>Thêm</button>
		</form>
	<?php include '../menu_bottom.php' ?>
