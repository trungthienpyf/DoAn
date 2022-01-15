<?php require '../check_super_admin_login.php';?>

<?php include'../menu_top.php'; ?>
<?php 
 	

require '../connect.php';

if(empty($_GET['id'])){
 		header('location:index.php?error=Phải điền mã');
		exit();
 	}

$id=$_GET['id'];

$sql="select * from admin where id ='$id'";
$check=mysqli_query($connect,$sql);
$checkrows=mysqli_num_rows($check);
if(empty($_GET['id']) || $checkrows!==1){
	header('location:index.php?error=Phải truyền mã');
	exit();
}



$sql="select * from admin where id='$id'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
 ?>	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Sửa nhân viên</h2>
	<form  style="padding:20px;" action="process_update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $each['id']?>">
		Tên nhà sản xuất
		<br>
		<input type="text" name="name" value="<?php echo $each['name']?>">
		<br>
		Email
		<br>
		<input type="email" name="email" value="<?php echo $each['email']?>">
		<br>
		Password
		<br>
		<input type="text" name="password" value="<?php echo $each['password']?>">
		<br>
		Điện thoại
		<br>
		<input type="number" name="phone" value="<?php echo $each['phone']?>">
		<br>
		Địa chỉ
		<br>
		<textarea  style="height: 100px;" type="text" name="address">
		<?php echo $each['address']?>
		</textarea>
		<div>
		<?php require '../check_error.php'; ?>
		
		<button class="btn">Sửa</button>
			
		</div>
		
	</form>
	<?php include'../menu_bottom.php'; ?>
