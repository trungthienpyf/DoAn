	<?php if(isset($_GET['error'])){ ?>
		<span  style="color: red;">
		<?php echo $_GET['error']; ?>
		</span>
	<?php } else  ?>
	<?php if(isset($_GET['success'])){ ?>
		<span style="color: green;">
		<?php echo $_GET['success']; ?>
		</span>
	<?php } else  ?>
	</div>
	</div>
	<div id="footer"></div>
	<script src="../js/main.js">
	</script>
</body>
</html>