<?php
include('./conn.php');
session_start();

//接收数据
$username=$_POST['user'];
$password=$_POST['pass'];


//验证有效性
if(strlen($username) < 2){
	exit("输入正确用户名");
}


//构造sql语句，查询语句是否存在
$sql="select * from admin where username='$username' and password='$password'";

//结果集
$rs=mysqli_query($conn, $sql);

//提交查询结果给客户端
if( mysqli_num_rows($rs)>0 ){
	
	//登陆成功时，添加SESSION变量
	$row=mysqli_fetch_assoc($rs);
	$lo=$row['status'];
	if($lo!==1){
		echo '1';
	$_SESSION['username']=$row['username'];
	$_SESSION['userid']=$row['id'];
	$_SESSION['usergroup']=$row['usergroup'];
	}else{
		echo '99';
	}
	
	
	
}else{
	echo '0';
}
 
 //释放结果集和数据库
mysqli_free_result($rs);
mysqli_close($conn);