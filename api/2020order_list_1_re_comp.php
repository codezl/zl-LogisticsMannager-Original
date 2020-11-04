<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['id'];
	$deli_sta=$_GET['deli_sta'];
	//构造sql删除语句
	$sql="update deli_order set serv_sta=serv_sta+1 where id=$id and $deli_sta=4 and (serv_sta=2 or serv_sta=4)";
	$r=mysqli_query($conn,$sql);
	//结果提交客户端
	if($r){
		$arr=["errcode"=>0 , "msg"=>"完成退单成功"];

		echo json_encode($arr);
		
	}else{
		$arr=["errcode"=>1,"msg"=>"完成退单失败"];
		echo json_encode($arr);
	}
	
?>