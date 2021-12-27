<?php 
require 'menu_index_top.php';
require 'admin/connect.php';
$id=$_GET['id'];
$sql ="select * from product where id='$id'";
$result=mysqli_query($connect,$sql);

?>
<?php  foreach ($result as $key => $each) { ?>

		<div style="display: flex; margin: auto;">
			<div style="width: 50%;">
				<img width="800" src="admin/product/photos/<?php echo $each['img'] ?>" alt="">
			</div>
			<div style="width: 50%;">
				<h1><?php echo $each['name']?> </h1>
				<p><?php echo number_format($each['price'], 0, '', ','); ?> vnđ</p>
				
			</div>
		</div>
		
 <?php  } ?>

 <?php require 'menu_index_bottom.php'; ?>