<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$receiver_province=$_POST['receiver_province'];
$receiver_city=$_POST['receiver_city'];
$receiver_region=$_POST['receiver_region'];
$receiver_phone=$_POST['receiver_phone'];
$receiver_name=$_POST['receiver_name'];
$id=$_POST['id'];


//构造SQL语句实现新增数据
$sql="update oms_order set receiver_province='$receiver_province',receiver_city='$receiver_city',receiver_region='$receiver_region',receiver_phone='$receiver_phone',receiver_name='$receiver_name' where id=$id";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}

?>