<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$id=$_POST['id'];
$price=$_POST['price'];
$num=$_POST['num'];
$num1=(int)$num; 
$price1=floatval($price);

$sql1="select * from oms_order_item where id=$id";
	$rs1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($rs1);
	$status1=$row1['pay_status'];
	if($status1=0){
		$sql="update oms_order_item set real_amount=$price1,product_quantity=$num1 where id=$id";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
	}else{
		$arr=["errcode"=>1004,"msg"=>"订单已经完成了不能修改"];
		echo json_encode($arr);
	}



?>