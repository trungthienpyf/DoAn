<?php require '../check_admin_login.php';?>

<?php require'../meu_top.php'?>

<?php require '../connect.php';


$id=$_GET['id'];
$sql="select * from product where id='$id'";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);
?>


<?php require'../menu_bottom.php'?>
