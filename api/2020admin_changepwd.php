<?php
include('./conn.php');
session_start();//sessio共享

//接收密码数据
$username=$_POST['username'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];

//查询数据
$sql="select * from admin where password='$oldpass' and id=".$_SESSION['userid'];
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs) > 0){
	//能查询到数据，提供的旧密码是正确的
	//修密码
	$sql="update admin set username='$username',password='$newpass' where id=".$_SESSION['userid'];
	$r=mysqli_query($conn,$sql);
	if($r){
		//密码修改成功
		echo '{"errcode":0, "msg":"密码修改成功"}';
	}else{
		//密码修改失败
		echo '{"errcode":1004, "msg":"密码修改失败"}';
	}
	
}else{
	//输入旧密码错误
	echo '{"errcode":1003, "msg":"旧密码有错"}';
}
?>