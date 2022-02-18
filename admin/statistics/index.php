<?php 
require '../connect.php';

$sql="select count(id) from customer";
$result=mysqli_query($connect,$sql);
$each=mysqli_fetch_array($result);


$sql="select count(id) from orders";
$result=mysqli_query($connect,$sql);
$select_total=mysqli_fetch_array($result);

$sql="select sum(total_price) from orders";
$result=mysqli_query($connect,$sql);
$select_price=mysqli_fetch_array($result);

$sql="select count(id) from orders where status=0";
$result=mysqli_query($connect,$sql);
$each_order=mysqli_fetch_array($result);
?>

<h2 style="padding: 10px 10px 10px 20px; display: inline-block; color: #0c2d68;">Thống kê</h2>
<div class="dashboard_info">
	<div class="dashboard_info_child" style="background-color:#17a2b8">
		<h2><?php echo $each_order['count(id)']?></h2>
		<p>Đơn hàng mới</p>
		<i class="fas fa-shopping-bag icon"></i>
	</div>
	<div class="dashboard_info_child" style="background-color:#28a745">
		<h2><?php echo $select_total['count(id)']?></h2>
		<p>Tổng đơn hàng</p>
		<i class="fas fa-shopping-cart icon"></i>

	</div>
	<div class="dashboard_info_child" style="background-color:#ffc107">
		<h2><?php echo $each['count(id)']?></h2>
		<p>Tài khoản đăng kí</p>
		<i class="fas fa-users icon"></i>

	</div>
	<div class="dashboard_info_child" style="background-color:#dc3545">
		<h2><?php echo number_format($select_price['sum(total_price)'], 0, '', '.')?> VNĐ</h2>
		<p>Tổng doanh thu</p>
		<i class="fas fa-dollar-sign icon"></i>

	</div>
</div>



<div class="chart_container">
	<figure class="highcharts-figure">
	<div id="container_body"></div>

	</figure>
	<figure class="highcharts-figure">
	<div id="container_body2"></div>

	</figure>
</div>

	</div>
	</div>
	<div id="footer"></div>
	<script src="../js/main.js">
	</script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: '../statistics/get_value_statistics.php',
				type: 'get',
				dataType: 'json',
				data: {days:30},
			})
			.done(function(response) {
				
				const arrX=Object.keys(response[0]);
				const arrY=Object.values(response[0]);
				
				Highcharts.chart('container_body', {
					  title: {
					    text: 'Doanh thu 30 ngày gần nhất'
					  },
					  yAxis: {
					    title: {
					      text: 'Tiền'
					    }
					  },

					  xAxis: {
					    categories: arrX
					  },

					  legend: {
					    layout: 'vertical',
					    align: 'right',
					    verticalAlign: 'middle'
					  },

					  plotOptions: {
					    series: {
					      label: {
					        connectorAllowed: false
					      },
					      
					    }
					  },

					  series: [{
					    name: 'Doanh thu',
					    data: arrY

					  }],

					  responsive: {
					    rules: [{
					      condition: {
					        maxWidth: 500
					      },
					      chartOptions: {
					        legend: {
					          layout: 'horizontal',
					          align: 'center',
					          verticalAlign: 'bottom'
					        }
					      }
					    }]
					  }

					});
					
					})
					
					
				});


			
	</script>
</body>
</html>