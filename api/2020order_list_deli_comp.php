<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
//注意使用get
$order_sn=$_GET['order_sn'];


//构造SQL语句实现新增数据
$sql="update deli_order set serv_sta=1 where order_sn='$order_sn'and serv_sta=0";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '{"re_code":1}';
}else{
	echo '{"re_code":0}';
}

?>