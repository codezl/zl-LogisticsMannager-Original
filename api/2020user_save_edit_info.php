<?php
include('./2020conn.php');
session_start();
//接收数据
//$username=$_POST['username'];
$nickname=$_POST['nickname'];
$phone=$_POST['phone'];
$birthday=$_POST['birthday'];
$pwd=$_POST['pwd1'];
$pwd2=$_POST['pwd2'];
$id=$_POST['id'];
$id1=$_SESSION['userid']
//$pwd3=base64_encode($pwd);
$lasttime=time();
$nowtime=intval(time());
if($username!==''){
	$sql="update ums_member set nickname='$nickname',password='$pwd',phon=$phone,birthday=$birthday where id=$id1";
$r=mysqli_query($conn, $sql);

//判断执行结果，根据结果返回数据
if($r){
	$_SESSION=[];

echo '<script>alert("更改成功");location.href="http://cart.gmall.com:8084/cartList";</script>';
}else{
	echo '0';
}
}else{
	echo '0';
}

?>