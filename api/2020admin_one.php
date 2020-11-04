<?php
include('./conn.php');

//获取ID
$id=$_GET['id'];

//构造SQL语句根据ID到数据库查询数据
$sql="select * from admin where id=$id";
$rs=mysqli_query($conn, $sql);

//读取数据，并且返回给客户端
if( $row=mysqli_fetch_assoc($rs) ){
	//由于根据ID查找数据只能找到一条，直接返回转换成JSON以后的数据
	echo json_encode($row);
}else{
	echo '{"errcode":1002,"msg":"数据不存在"}';
}
?>