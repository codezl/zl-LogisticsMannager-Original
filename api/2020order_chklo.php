<?php
include('./2020conn.php');
session_start();

//接收数据
$id=$_GET['id'];



//验证有效性


//构造sql语句，查询语句是否存在
$sql="select * from ums_member where id=$id";

//结果集
$rs=mysqli_query($conn, $sql);

//提交查询结果给客户端
if( mysqli_num_rows($rs)>0 ){
	//可以修改成username_u表示这是普通用户的缓存
	//登陆成功时，添加SESSION变量
	$row=mysqli_fetch_assoc($rs);
//	$lo=$row['status'];
//	if($lo==0){
		echo '1';
	$_SESSION['username']=$row['username'];
	$_SESSION['userid']=$row['id'];
	$_SESSION['usergroup']=$row['usergroup'];
//	}else{
//		echo '99';
//	}
	
	
	
}else{
	echo '0';
}
 
 //释放结果集和数据库
mysqli_free_result($rs);
mysqli_close($conn);