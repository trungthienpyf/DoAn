<?php require '../check_super_admin_login.php';?>

	<?php include '../menu_top.php' ?>
		<form action="process_insert.php" method="post">
			Tên thể loại
			<input type="text" name="name">
			<button>Thêm</button>
		</form>
	<?php include '../menu_bottom.php' ?>
