<?php
	include('./2020conn.php');
//	include('./conn1.php');调用多个数据库可以考虑创建多个连接
	session_start();//sessio共享
	//接受get方法
	$id=$_GET['id'];
    //$id1=$_SESSION['userid'];
	
	$sql1="select * from admin where id=".$_SESSION['userid'];
	$rs1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($rs1);
	$status1=$row1['status'];
	if($status1==2){
	//构造sql删除语句
	$sql="delete from ums_member where id=$id";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["errcode"=>0 , "msg"=>"删除成功"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["errcode"=>1003,"msg"=>"删除成功"];
		echo json_encode($arr);
	}
}else{
	$arr=["errcode"=>1004,"msg"=>"权限不够，快去请佛祖"];
	echo json_encode($arr);
}

?>