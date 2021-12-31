<?php require'../menu_top.php'?>

<?php require '../connect.php';
$sql_nsx="select * from manufacturers";
$result_nsx=mysqli_query($connect,$sql_nsx);

$sql_the_loai="select * from category_detail";
$result_the_loai=mysqli_query($connect,$sql_the_loai);
?>
	<form action="process_insert.php" method="post" enctype="multipart/form-data">
		Tên sản phẩm
		<br>
		<input type="text" name="name">
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
		<br>
		<button>Thêm</button>
	</form>
<?php require'../menu_bottom.php'?>