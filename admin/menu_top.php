<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Source+Sans+Pro:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

	<div id="header" >
		
		<div class="header-compoment">
			<div class="header-logo">
			    <img style="padding-left: 10px;" height="65px" src="../photos_logo/logo_da.gif" alt="">
			</div>
			<ul class="header-container ">
				
				<li class="header-list "><a href="" class="header-item header-item--effect" >Hello <?php echo $_SESSION['name_admin']?> 
				 <!-- <i id="toggle_icon" class="fas fa-sort-down "></i> -->
				</a></li>
				<li class="header-list"><a href="../log_out.php" class="header-item " >Đăng xuất
				 <!-- <i id="toggle_icon" class="fas fa-sort-down "></i> -->
				</a></li>
			</ul>
		</div>
	</div>
	<div id="container">
		<div class="navbar">
			<ul class="navbar-body">
				<li class="navbar-list"><a href="../root" class="navbar-item">Trang chủ</a></li>
				<li class="navbar-list pointer " id="category"><a class="navbar-item head_color">Danh mục <i id="toggle_icon" class="fas fa-chevron-right icon_padding"></i></a>
				</li>
				<div id="category_sub" class="display_click">
				<li class="navbar-list_sub  animation_nav "><a href="../category" class="navbar-item">Quản lý danh mục chính</a></li>	
				<li class="navbar-list_sub  animation_nav " ><a href="../category_sub" class="navbar-item">Quản lý danh mục phụ</a></li>	
				</div>
				
				<li class="navbar-list"><a href="../manufactures" class="navbar-item">Quản lý nhà sản xuất</a></li>
				<li class="navbar-list"><a href="../staff" class="navbar-item">Quản lý nhân viên</a></li>
				<li class="navbar-list"><a href="../product" class="navbar-item">Sản phẩm</a></li>
				<li class="navbar-list"><a href="../orders" class="navbar-item">Đơn hàng</a></li>
			</ul>
		</div>
		<div class="main-body">
	