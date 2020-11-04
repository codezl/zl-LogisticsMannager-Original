<?php
include('./conn.php');
session_start();//sessio共享
//接收数据
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$status=$_POST['status'];
$id=$_POST['id'];

if($status==2){
	$sql1="select * from admin where id=".$_SESSION['userid'];
	$rs1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($rs1);
	$status1=$row1['status'];
	if($status1==2){
//构造SQL语句实现新增数据
$sql="update admin set username='$username',password='$pwd',set status=2 where id=$id";
$r=mysqli_query($conn, $sql);

//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
	}else{
		echo '2';
	}
}else{
	//构造SQL语句实现新增数据
$sql1="update admin set username='$username',password='$pwd',status='$status' where id=$id";
$r1=mysqli_query($conn, $sql1);

//判断执行结果，返回数据
if($r1){
	echo '1';
}else{
	echo '0';
}
}

?>