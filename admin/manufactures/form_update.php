<?php require '../check_super_admin_login.php';?>

<?php include'../menu_top.php'; ?>
<?php 
 	

require '../connect.php';
$id=$_GET['id'];
if(empty($_GET['id'])){
 		header('location:index.php?error=Phải điền mã');
		exit();
 	}


$sql="select * from manufacturers where id='$id'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
 ?>
	<form action="process_update.php" method="post">
		Tên nhà sản xuất
		<input type="hidden" name="id" value="<?php echo $each['id']?>">
		<input type="text" name="name" value="<?php echo $each['name']?>">
		<button>Sửa</button>
	</form>
	<?php include'../menu_bottom.php'; ?>
