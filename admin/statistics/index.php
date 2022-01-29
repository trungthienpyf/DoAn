<?php 
require '../connect.php'

?>



<figure class="highcharts-figure">
  <div id="container_body"></div>
  
</figure>
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
			Highcharts.chart('container_body', {

	  title: {
	    text: 'Sản phẩm'
	  },

	  

	  yAxis: {
	    title: {
	      text: 'Tiền'
	    }
	  },

	  xAxis: {
	    categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
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
	    name: 'Installation',
	    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175,1,1,1,1]
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
	</script>
</body>
</html>