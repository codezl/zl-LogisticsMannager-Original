<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['id'];
	
	//构造sql删除语句
	$sql="update oms_order set status=0 where id=$id and status=1";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["ser_code"=>0 , "msg"=>"拒绝退货配送"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["ser_code"=>1,"msg"=>"拒绝退货配送失败"];
		echo json_encode($arr);
	}
	

?>