<?php 
require '../connect.php';

$max_date=30;

$sql="SELECT SUM(CASE WHEN status = '1' THEN 1 ELSE 0 END) AS succes ,
SUM(CASE WHEN status = '2' THEN 1 ELSE 0 END) AS failed
FROM `orders` WHERE 1";
$result=mysqli_query($connect,$sql);

$arr=[];
foreach ($result as $key =>  $each) {
	
	$arr[]=$each;

}

$object= json_encode($arr);
echo $object;