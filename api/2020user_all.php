<?php
include('./2020conn.php');
//设置跨域的响应头
//header('Access-Control-Allow-Origin:*');
//构造SQL语句读取数据
$sql="select * from ums_member";
$rs=mysqli_query($conn, $sql);

$data=[]; 
while($row=mysqli_fetch_assoc($rs)){
	array_push($data,$row); //将所有数据遍历放在 $data数组中
}

//将所有数据生成的二维数组以JSON格式输出
echo json_encode($data);
?>