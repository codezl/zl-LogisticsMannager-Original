<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$id=$_GET['id'];

$sql="update oms_order set status=1 where id=$id";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
	

?>