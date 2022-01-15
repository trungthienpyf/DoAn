<?php 
session_start();
if(isset($_SESSION['id_admin'])){
	header('location:root/index.php');
	exit();
}
?>
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
			box-sizing: border-box;
		}
		.main{
			background-color: #f1f1f1;
			min-height: 100vh;
			display: flex;
			flex-direction: column;

		}
		.main_form{
			margin: auto;
			min-height: 100px;
			background-color: white;
			margin-top: 200px;
			width: 360px;
			border-radius: 2px;
			box-shadow: 0 2px 5px 0 rgb(63 73 84 / 10%);
		}
		.main_input{
			display: flex;
			flex-direction: column;
			padding: 10px;
		}
		h2{
			text-align: center;
			padding: 26px 16px 0;
		}
		
		input{
			outline: none;
		}
		#input_email{
			margin-top: 6px;
			padding: 6px;
		}
		#input_pass{
			margin-top: 6px;
			padding: 6px;
		}
		.btn{
			float: right;
			background-color: #34b334;
			color: white;
			padding: 10px 10px;
			border: none;
			border-radius: 2px;
			margin-right: 10px;
			margin-bottom: 10px;
			cursor: pointer;
		}
		.warning{
			outline: none;
			margin: 6px 0;
			padding: 8px;
			border:1.5px  solid #f33a58 ;
		}
	</style>
</head>
<body>
	<?php

	?>
	<div class="main">
		<form class="main_form" action="process_login.php" method="post"  onsubmit="return kiemtra()">
		<h2 >Đăng nhập</h2>
		<div class="main_input">
			<label for="input_email">Email</label>			
			<input  id="input_email" type="email" name="email" placeholder="Email">
			<span style="color:red;" id="warning_email"></span>
		</div>
		<div class="main_input">
			<label for="input_pass">Password</label>
			<input id="input_pass" type="password" name="password" placeholder="Password">
			<span style="color:red;" id="warning_pass"></span>
			<span style="color:red;"><?php 
				if(isset($_GET['error'])){
				$error=$_GET['error'];
				 echo $error;

				}
			?></span>
			
		</div>
		<div>
		<button id="btn" class="btn" >Đăng nhập</button>
		</div>
	</form>
	</div>
	<script src="js/check_login.js" >
	</script>
</body>
</html>