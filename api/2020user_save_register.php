<?php
include('./2020conn.php');

//接收数据
$username=$_POST['username'];
$nickname=$_POST['nickname'];
$phone=$_POST['phone'];
$birthday=$_POST['birthday'];
$pwd=$_POST['pwd'];
$pwd2=$_POST['pwd2'];
//$pwd3=base64_encode($pwd);
$lasttime=time();
$nowtime=intval(time());
if($username!==''){
	$sql="insert into ums_member (username,password,nickname,phone,birthday,create_time) values('$username','$pwd','$nickname','$phone',$nowtime,$nowtime)";
$r=mysqli_query($conn, $sql);

//判断执行结果，根据结果返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
}else{
	echo '0';
}

?>