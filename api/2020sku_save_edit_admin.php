<?php
include('./2020conn.php');

//接收数据
$id=$_POST['id'];
$sku_name=$_POST['sku_name'];
$price=$_POST['price'];
$sku_desc=$_POST['sku_desc'];
$weight=$_POST['weight'];
$sku_default_img=$_POST['sku_default_img'];

$price1=(double)$price;
$weight1=(double)$weight;
//构造SQL语句实现新增数据
$sql="update pms_sku_info set sku_name='$sku_name',price=$price1,sku_desc='$sku_desc',weight=$weight,sku_default_img='$sku_default_img' where id=$id";
$r=mysqli_query($conn, $sql);

//var_dump(  mysqli_error($conn)  ); //查看服务器端执行出错的典型调试方法
//exit;

//判断执行结果，根据结果返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
?>