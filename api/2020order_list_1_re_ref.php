<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['id'];
	$serv_sta=$_GET['serv_sta'];
	//构造sql删除语句
	$sql="update oms_order set deli_sta=3 where id=$id and deli_sta=2 and $serv_sta=1";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["errcode"=>0 , "msg"=>"退单成功"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["errcode"=>1,"msg"=>"退单失败"];
		echo json_encode($arr);
	}
	

?>