<?php require '../check_admin_login.php';?>

<?php require'../menu_top.php'?>

<?php require '../connect.php';
$sql_nsx="select * from manufacturers";
$result_nsx=mysqli_query($connect,$sql_nsx);

$sql_the_loai="select * from category_detail";
$result_the_loai=mysqli_query($connect,$sql_the_loai);
?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Thêm sản phẩm</h2>
	<form  style="padding:20px;" action="process_insert.php" method="post" enctype="multipart/form-data">
		Tên sản phẩm
		<br>
		<input type="text" name="name" placeholder="Tên sản phẩm">
		<br>
		Giá
		<br>
		<input type="number" name="price">
		<br>
		Ảnh
		<br>
		<input type="file" name="img">
		<br>
		Mô tả sản phẩm
		<textarea name="description"></textarea>
		<br>
		Nhà sản xuất
		<select name="id_manufacturers"> 
			<?php foreach ($result_nsx as $key => $each) { ?>

				<option value="<?php echo $each['id']?>">
					<?php echo $each['name']?>
						
					</option>

			<?php }  ?>
		</select>
		<br>
		Thể loại
		<select name="id_category"> 
			<?php foreach ($result_the_loai as $key => $each) { ?>

				<option value="<?php echo $each['id']?>">
					<?php echo $each['name']?>
						
					</option>

			<?php }  ?>
		</select>
		<?php require '../check_error.php'; ?>
		<div>
		
		
		<button class="btn">Thêm</button>
			
		</div>
	</form>
<?php require'../menu_bottom.php'?>