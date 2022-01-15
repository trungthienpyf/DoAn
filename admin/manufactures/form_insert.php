<?php require '../check_super_admin_login.php';?>

<?php include'../menu_top.php'; ?>

<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Thêm nhà sản xuất</h2>
	<form style="padding:20px;" action="process_insert.php" method="post">
		Tên nhà sản xuất
		<input type="text" name="name" placeholder="Tên nhà sản xuất">
		<div>
		<?php require '../check_error.php'; ?>
		
		<button class="btn">Thêm</button>
			
		</div>
	</form>
	
<?php include'../menu_bottom.php'; ?>
