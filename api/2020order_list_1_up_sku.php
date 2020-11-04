<?php
	include('./2020conn.php');
	//接受get方法
	$id=$_GET['id'];
	$order_sn=$_GET['order_sn'];
	//构造sql删除语句
	$sql="UPDATE pms_sku_info
SET sale_num = sale_num + 1
WHERE
	id IN (
		SELECT
			product_sku_id
		FROM
			oms_order_item
		WHERE
			order_sn = '$order_sn'
	)
AND 0 = (
	SELECT
		deli_sta
	FROM
		oms_order
	WHERE
		order_sn = '$order_sn'
)";
	$r=mysqli_query($conn,$sql);
	
	//结果提交客户端
	if($r){
		$arr=["errcode"=>0 , "msg"=>"确认收货成功，感谢您的购物"];
	
		echo json_encode($arr);
		
	}else{
		$arr=["errcode"=>1,"msg"=>"确认成功"];
		echo json_encode($arr);
	}
	

?>