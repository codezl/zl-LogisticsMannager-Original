<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['de_id'];
	
	//构造sql删除语句
	$sql="update deli_order set serv_sta=2 where id=$id and serv_sta=1";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["ser_code"=>0 , "msg"=>"同意退货配送"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["ser_code"=>1,"msg"=>"同意退货配送失败"];
		echo json_encode($arr);
	}
	

?>