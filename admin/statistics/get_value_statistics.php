<?php 
require '../connect.php';

$max_date=$_GET['days'];

$sql="SELECT DATE_FORMAT(time,'%e-%m') as 'time_date',
	sum(total_price) as 'sum' 
	FROM orders 
	where status=1
	GROUP BY time_date";
$result=mysqli_query($connect,$sql);

$today=date('d');
if($max_date >$today){
$get_day_last_month=30-$today;
$last_month=date('m',strtotime("-1 month")); 
$this_month=date('m'); 
$last_month_date=date('Y-m-d',strtotime("-1 month")); 
$max_day_last_month=(new DateTime($last_month_date))->format('t');
$start_day_last_month=$max_day_last_month-$get_day_last_month;
}else{
	$get_day_last_month=31-$today;
	$last_month=date('m',strtotime("-1 month")); 
$last_month_date=date('Y-m-d',strtotime("-1 month")); 
$this_month=date('m'); 
$max_day_last_month=(new DateTime($last_month_date))->format('t');
$start_day_last_month=$max_day_last_month-$get_day_last_month;
}

$arr=[];
for($i=$start_day_last_month; $i<=$max_day_last_month;$i++){
	$key=$i . '-' .$last_month;
	$arr[$key]=0;
}
for($i=1; $i<=$today;$i++){
	$key=$i . '-' .$this_month;
	$arr[$key]=0;
}
foreach ($result as $each) {
	$arr[$each['time_date']]=(float)$each['sum'];
}

$arr1=[];
$object= json_encode([$arr,$arr1]);
echo $object;

?>