<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$member_id=$_POST['member_id'];
$order_sn=$_POST['order_sn'];
$receiver_province=$_POST['receiver_province'];
$receiver_city=$_POST['receiver_city'];
$receiver_region=$_POST['receiver_region'];
$receiver_phone=$_POST['receiver_phone'];
$receiver_name=$_POST['receiver_name'];
$deli_phone=$_POST['deli_phone'];
$id=$_POST['userid'];
$member1=(int)$member_id;

//构造SQL语句实现新增数据
$sql="insert into deli_order(member_id,receiver_province,receiver_city,receiver_region,receiver_phone,receiver_name,deli_phone,deli_id,order_sn) 
values
      ($member1,'$receiver_province','$receiver_city','$receiver_region','$receiver_phone','$receiver_name','$deli_phone',10,'$order_sn')";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}

?>