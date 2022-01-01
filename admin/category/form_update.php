<?php require '../check_super_admin_login.php';?>

<?php include '../menu_top.php' ?>


<?php 

if(empty($_GET['id'])){
	header('location:index.php?error=Phải truyền mã');
	exit();
}
require '../connect.php';

$id=$_GET['id'];

$sql="select *from category where id='$id'";

$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
?>
	<form action="process_update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $each['id']; ?>">
		Tên thể loại
		<input type="text" name="name" value="<?php echo $each['name']; ?>">
		<button>Thêm</button>
	</form>
<?php include '../menu_bottom.php' ?>
