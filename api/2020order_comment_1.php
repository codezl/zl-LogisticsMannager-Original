<?php
include('./2020conn.php');
session_start();//sessio共享
//接收数据
$comment_tx=$_POST['comment_tx'];
$com_lev=$_POST['com_lev'];
$id=$_POST['id'];
$memberid=$_SESSION['userid'];//需要取session，测试阶段直接赋值，或者使用链接占位符

//设置order_id字段不重复或取状态字段限制评论条数
//构造SQL语句实现新增数据
$sql="insert into shop_comment(order_id,comment_tx,com_lev,member_id) values('$id','$comment_tx','$com_lev',5)";
$r=mysqli_query($conn, $sql);

//$sql1="update oms_order set status=2 where id=$id and order_id=or";绑定另一个方法
//判断执行结果，返回数据
if($r){
	echo '1';
}else{
	echo '0';
}

?>