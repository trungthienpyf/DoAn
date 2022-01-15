<?php require '../check_super_admin_login.php';?>

	<?php include '../menu_top.php' ?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Thêm thể loại</h2>
		<form  style="padding:20px;" action="process_insert.php" method="post" >
			Tên thể loại
			<input type="text" name="name"  placeholder="Tên thể loại">
			
			<div>
			<?php require '../check_error.php'; ?>
				
			<button class="btn">Thêm</button>
			</div>
		</form>
	<?php include '../menu_bottom.php' ?>
