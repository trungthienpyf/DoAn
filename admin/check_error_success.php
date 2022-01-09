<?php if(isset($_GET['error'])){ ?>
		<span  style="color: red; padding-left: 20px;">
		<?php echo $_GET['error']; ?>
		</span>
	<?php } ?>
	<?php if(isset($_GET['success'])){ ?>
		<span style="color: green;  padding-left: 20px;">
		<?php echo $_GET['success']; ?>
		</span>
<?php }  ?>