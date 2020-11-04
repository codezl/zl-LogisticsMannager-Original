<?php
include('./conn.php');

//接收数据
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$usergroup=$_POST['usergroup'];


//构造SQL语句实现新增数据
$sql="insert into user(ordername,price,usergroup) values('$username','$pwd','$usergroup')";
$r=mysqli_query($conn, $sql);

//判断执行结果，根据结果返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
?>