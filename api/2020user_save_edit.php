<?php
include('./2020conn.php');

//接收数据
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$luckey_count=$_POST['luckey_count'];
$usergroup=$_POST['usergroup'];
$id=$_POST['id'];

//折扣先把前端拿到的字符串转化成数字类型
//$count=number_format($luckey_count); 转化成数字字符
//$count=(int)$luckey_count;  这个属于整数类型，用来做折扣标记不是很适合
$count=floatval($luckey_count);

//构造SQL语句实现新增数据
$sql="update ums_member set username='$username',password='$pwd',discount=$count,usergroup=$usergroup where id=$id";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
?>