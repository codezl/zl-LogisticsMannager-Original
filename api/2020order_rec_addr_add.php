<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$username=$_POST['username'];
$re_phone=$_POST['re_phone'];
$post_code=$_POST['post_code'];
$re_provice=$_POST['re_provice'];
$re_city=$_POST['re_city'];
$re_gion=$_POST['re_gion'];
$re_detail_addr=$_POST['re_detail_addr'];
$id=$_SESSION['userid'];

//构造SQL语句实现新增数据
$sql="insert into ums_member_receive_address(member_id,name,phone_number,post_code,province,city,region,detail_address) 
values('$id','$username','$re_phone','$post_code','$re_provice','$re_city','$re_gion','re_detail_addr')";
$r=mysqli_query($conn, $sql);

//判断执行结果，根据结果返回数据
if($r){
	echo '1';
}else{
	echo '0';
}
?>