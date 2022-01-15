

<?php require '../check_admin_login.php';?>

<?php require'../menu_top.php'?>

<?php require '../connect.php';
$id=$_GET['id'];
$sql="select * from product where id ='$id'";
$check=mysqli_query($connect,$sql);
$checkrows=mysqli_num_rows($check);
if(empty($_GET['id']) || $checkrows!==1){
	header('location:index.php?error=Phải truyền mã');
	exit();
}




$sql="select * from product where id='$id'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);

$sql_nsx="select * from manufacturers";
$result_nsx=mysqli_query($connect,$sql_nsx);

$sql_the_loai="select * from category_detail";
$result_the_loai=mysqli_query($connect,$sql_the_loai);
?>
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Sửa sản phẩm</h2>
	<form  style="padding:20px;" action="process_update.php" method="post" enctype="multipart/form-data">
		Tên sản phẩm 
		<br>
		<input type="hidden" name="id" value="<?php echo $each['id']?>">
		<input type="text" name="name" value="<?php echo $each['name']?>">
		<br>
		Giá
		<br>
		<input type="number" name="price" value="<?php echo $each['price']?>">
		<br>
		Ảnh

		<input type="file" name="img_new" >
		<br>
		Ảnh củ
		<img width="80" src="photos/<?php echo $each['img'] ?>" alt="" >
		<input type="hidden" name="img_old" value="<?php echo $each['img']?>">
		
		<br>
		Mô tả sản phẩm
		<textarea name="description"><?php echo $each['description']?></textarea>
		<br>
		Nhà sản xuất
		<select name="id_manufacturers"> 
			<?php foreach ($result_nsx as $key => $manufacturers) { ?>

				<option value="<?php echo $manufacturers['id'] ?>"
						<?php if($manufacturers['id'] == $each['manufacturers_id']) {?>
						selected
						<?php } ?>
						>
					<?php echo $manufacturers['name']?> 
						
					</option>

			<?php }  ?>
		</select>
		<br>
		Thể loại
		<select name="id_category"> 
			<?php foreach ($result_the_loai as $key => $categorys) { ?>

				<option value="<?php echo $categorys['id']?>"
					<?php if($categorys['id'] == $each['category_detail_id']) { ?>
						selected
					<?php } ?>
					>
					<?php echo $categorys['name']?>
						
					</option>

			<?php }  ?>
		</select>
		<br>
		<?php require '../check_error.php'; ?>
		<div>
		<button class="btn">Sửa</button>
			
		</div>
	</form>
<?php require'../menu_bottom.php'?>