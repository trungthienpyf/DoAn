<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<?php 
	$id=$_SESSION['id'];
	require 'connect.php';
	$sql="select * from admin where id='$id'";
	$result=mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);
	?>
	<div id="header" >
		
		<div class="header-compoment">
			<div class="header-logo">
			    <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=height:60/https://file-uploads.teachablecdn.com/b9a1df092250467bb2a4c2950413e9a1/ee1a0cfc513f4153bcbc1a4f7f879592" alt="">
			</div>
			<ul class="header-container ">
				
				<li class="header-list "><a href="" class="header-item header-item--effect" >Hello <?php echo $each['name']?> 
				 <!-- <i id="toggle_icon" class="fas fa-sort-down "></i> -->
				</a></li>
				<li class="header-list"><a href="" class="header-item " >Đăng xuất
				 <!-- <i id="toggle_icon" class="fas fa-sort-down "></i> -->
				</a></li>
			</ul>
		</div>
	</div>
	<div id="container">
		<div class="navbar">
			<ul class="navbar-body">
				
				<li class="navbar-list pointer " id="category"><a class="navbar-item head_color">Danh mục <i id="toggle_icon" class="fas fa-chevron-right icon_padding"></i></a>
				</li>
				<div id="category_sub" class="display_click">
				<li class="navbar-list_sub  animation_nav "><a href="../category" class="navbar-item">Quản lý danh mục chính</a></li>	
				<li class="navbar-list_sub  animation_nav " ><a href="../category_sub" class="navbar-item">Quản lý danh mục phụ</a></li>	
				</div>
				
				<li class="navbar-list"><a href="../manufactures" class="navbar-item">Quản lý nhà sản xuất</a></li>
				<li class="navbar-list"><a href="../product" class="navbar-item">Sản phẩm</a></li>
				<li class="navbar-list"><a href="" class="navbar-item">Đơn hàng</a></li>
			</ul>
		</div>
		<div class="main-body">
	<?php if(isset($_GET['error'])){ ?>
		<span style="color: red;">
		<?php echo $_GET['error']; ?>
		</span>
	<?php } else  ?>
	<?php if(isset($_GET['success'])){ ?>
		<span style="color: green;">
		<?php echo $_GET['success']; ?>
		</span>
	<?php } else  ?>