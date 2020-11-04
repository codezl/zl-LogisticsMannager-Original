<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['id'];
	
	//构造sql删除语句
	$sql="delete from pms_sku_info where id=$id";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["errcode"=>0 , "msg"=>"删除成功"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["errcode"=>1003,"msg"=>"删除成功"];
		echo json_encode($arr);
	}
	

?>