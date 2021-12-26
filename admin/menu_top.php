<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: none;
		}
		#header{
			width: 100%;
			height: 65px;
			background-color: #3f87f6 ;
			position: fixed;
			top: 0;
		}
		#container{
			margin-top: 65px;
			width: 100%;
			height: 100vh;
		}
		.navbar{
			position: fixed;
			height: 100%;
			width: 250px;
			background-color: #343a40;
			left: 0;

		}
		.main-body{
			margin-left:250px ;
			
			height: 100%;
		}
		.navbar-list{
			margin: 15px 15px 10px 30px;
			font-size: 20px ;
			color: red;
		}
		.navbar-item{
			text-decoration: none;
			color: #c2c7d0;
		}
		.header-compoment{
			display: flex;
			justify-content: space-between;
			padding: 0 100px;
			
		}
		.header-container{
			display: flex;
			
		}
		.header-list{
			
			list-style: none;
			padding: 22px 20px;

		}
		.header-item{
			text-decoration: none;
			color: white;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div id="header" >
		
		<div class="header-compoment">
			<div class="header-logo">
			    <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=height:60/https://file-uploads.teachablecdn.com/b9a1df092250467bb2a4c2950413e9a1/ee1a0cfc513f4153bcbc1a4f7f879592" alt="">
			</div>
			<ul class="header-container">
				<li class="header-list"><a href="" class="header-item">Thông báo</a></li>
				<li class="header-list"><a href="" class="header-item">Tài khoản</a></li>
			</ul>
		</div>
	</div>
	<div id="container">
		<div class="navbar">
			<ul class="navbar-body">
				<li class="navbar-list"><a href="" class="navbar-item">Trang Chủ</a></li>
				<li class="navbar-list"><a href="../manufactures" class="navbar-item">Quản lý nhà sản xuất</a></li>
				<li class="navbar-list"><a href="../category" class="navbar-item">Quản lý danh mục</a></li>
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