<?php require '../check_super_admin_login.php';?>

<?php include'../menu_top.php'; ?>

<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Thêm nhân viên</h2>
	<form style="padding:20px;" action="process_insert.php" method="post">
		Tên nhân viên
		<br>
		<input type="text" name="name" placeholder="Tên nhân viên">
		<br>
		
		Số điện thoại
		<br>
		<input type="number" name="phone" placeholder="Số điện thoại">
		<br>
		Email
		<br>
		<input type="email" name="email" placeholder="Email">
		<br>
		Password
		<br>
		<input type="password" name="password" placeholder="Password">
		<br>
		Địa chỉ
		<br>
		<textarea style="height: 100px;" type="text" name="address" placeholder="address"></textarea> 
		
		<?php require '../check_error.php'; ?>
		
		<div>
		
		<button class="btn">Thêm</button>
			
		</div>
	</form>
	
<?php include'../menu_bottom.php'; ?>
