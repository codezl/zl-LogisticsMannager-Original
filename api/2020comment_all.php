<?php
include('./2020conn.php');
//设置跨域的响应头
//header('Access-Control-Allow-Origin:*');
//构造SQL语句读取数据
session_start();//sessio共享
//接收查询条件
//$id=$_GET['id'];
$keywords=$_GET['keywords'];
$id1=$_SESSION['userid'];
//$sql="select * from shop_comment";原来做的不带商品信息的单表查询
$sql="SELECT
	shop_comment.id,shop_comment.order_id,shop_comment.cre_time,comment_tx,member_id,com_lev,sku_name_list
FROM
	shop_comment,
	(
		SELECT
			order_id,
			GROUP_CONCAT(
				oms_order_item.product_name SEPARATOR '、'
			) sku_name_list
		FROM
			oms_order_item
		GROUP BY
			order_id) a WHERE shop_comment.order_id=a.order_id ORDER BY cre_time DESC ";
$rs=mysqli_query($conn, $sql);

if($keywords!==''){
	$sql.=" where order_id like '%$keywords%'or a.sku_name_list like '%$keywords%'";
}

//设置每页显示多少条数据？
$pagesize=5;
//获取到当前在第几页上
$page=isset($_GET['page']) ? $_GET['page'] : 1; //选择设置默认值为第1页

//条件3：计算出一共有多少条数据？
$rs=mysqli_query($conn,$sql); //根据条件查询出所有数据，统计数据总条数
$recordcount = mysqli_num_rows($rs);

//步骤2：计算出当前页应当显示哪些数据
$start=($page-1) * $pagesize; //计算跳过多条少数据
$sql.=" limit $start,$pagesize";
$rs=mysqli_query($conn,$sql);

//将数据封装成JSON对象输出
$data=[];
while($row= mysqli_fetch_assoc($rs)){
	array_push($data,$row);
}

//步骤3：计算出总页数
$pagecount=ceil($recordcount / $pagesize);//ceil向上取整
array_push($data,$pagecount); //将总页数带到浏览器端

//以JSON形式输出数据
echo json_encode($data);

?>