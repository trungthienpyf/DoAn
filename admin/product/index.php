<?php require '../check_admin_login.php';?>
<?php require'../menu_top.php'?>
<?php require '../connect.php';

$search='';
if(isset($_GET['search'])){
	$search=$_GET['search'];
}


$sql_product_number="select count(*) from product where name like '%$search%' 
or description like '%$search%'";
$array_product=mysqli_query($connect,$sql_product_number);
$result_product=mysqli_fetch_array($array_product);
$product_number=$result_product['count(*)'];
$product_number_in_page=10;

$page=ceil($product_number/$product_number_in_page);
$get_page=1;
if(isset($_GET['page'])){
	$get_page=$_GET['page'];
}
$passed=$product_number_in_page*($get_page-1);

$sql="select * from product where name like '%$search%' 
or description like '%$search%' 
limit $product_number_in_page offset $passed
";
$result=mysqli_query($connect,$sql);

?>	
	
	<h2 style="padding: 10px; display: inline-block; color: #0c2d68;" >Sản phẩm</h2>
	<div style="padding: 10px 20px;">
		<form action="">
			<span style="font-size: 24px; ">Tìm kiếm</span>
		<input style="margin: 0 0 0 16px;" type="search" name="search" value="<?php echo $search?>" placeholder="Tìm kiếm sản phẩm">
	</form></div>
	<?php require '../check_error_success.php'; ?>
	<a class="create_title" href="form_insert.php">Thêm sản phẩm</a>
	
	<table border="1" width="100%">
		<tr>
		<th >ID</th>
		<th >Tên</th>
		<th >Mô tả</th>
		<th >Ảnh</th>
		<th >Giá</th>
		<th >Sửa</th>
		<th >Xóa</th>
		</tr>
		<?php foreach ($result as $key => $each) { ?>
			<tr style="text-align:center;" >
				<td><?php echo $key+1 ?></td>
				<td><?php echo $each['name'] ?></td> 
				<td><?php echo $each['description'] ?></td> 
				<td>
					<img width="80" src="photos/<?php echo $each['img'] ?>" alt="">
				</td> 
				<td><?php echo number_format($each['price'] , 0, '', ','); ?> đ</td> 
				<td >
					<a class="alter_style" href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
				</td> 
			 	<td >
					<button onClick="delete_product(<?php echo $each['id'];?>,'<?php echo $each['name'];?>')" class="delete_style">Xóa</button>
				</td> 
			</tr>
		<?php } ?> 
		
	</table>
	<div class="pagination">
		<?php if($get_page>1){ 
		$back=$get_page-1; ?>	
		<a href="?page=<?php echo $back ?>&search=<?php echo $search?>"><</a>
		<?php } ?> 
		<?php for($i=1;$i<=$page;$i++){ ?>

			<a href="?page=<?php echo $i?>&search=<?php echo $search?>">
				<?php echo $i?>
				</a>
		<?php } ?>
		
		<?php if($get_page<$page){ 
			$next=$get_page+1; ?>
		<a href="?page=<?php echo $next ?>&search=<?php echo $search?>">></a>
		<?php } ?> 
	</div>
	<script type="text/javascript">
		function delete_product(id,name) {
		 	if(confirm ("Bạn có chắc chắn muốn xóa "+name+" ?")){
		 		window.location.href='process_delete.php?id='+id;
		 	}		 
		
		}
		
	</script>
<?php require'../menu_bottom.php'?>