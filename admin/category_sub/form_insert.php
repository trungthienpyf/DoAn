<?php require '../check_super_admin_login.php';?>



	<?php include '../menu_top.php' ?>
	<?php include '../connect.php';

	$sql="select * from category";
	$result=mysqli_query($connect,$sql);
	?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Thêm thể loại phụ</h2>
		<form style="padding:20px;" action="process_insert.php" method="post">
			Tên thể loại phụ
			<input type="text" name="name" placeholder="Tên thể loại phụ">
			<br>
			Thể loại
			<select name="category_id">
				<?php foreach ($result as $key => $each) { ?>
					<option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>
				<?php } ?>
				
			</select>
			<br>
			<div>
			<?php require '../check_error.php'; ?>
			
			<button class="btn">Thêm</button>
				
			</div>
		</form>
	<?php include '../menu_bottom.php' ?>
