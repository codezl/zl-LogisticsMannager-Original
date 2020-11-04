<?php
include('./2020conn.php');
session_start();//sessio共享
//接收查询条件
$id=$_GET['id'];
$keywords=$_GET['keywords'];
//$id1=$_SESSION['userid'];用户查询自己的商品使用自己id缓存
//构造根据条件查询的SQL语句
$sql="SELECT
	*
FROM
	(
		SELECT
			o.id,
			o.member_id,
			o.order_sn,
			o.create_time,
			o.member_username,
			o.total_amount,
			o.pay_amount,
			o.`status`,
			o.receiver_name,
			o.receiver_phone,
			receiver_post_code,
			o.receiver_province,
			o.receiver_city,
			o.receiver_region,
			receiver_detail_address,
			deli_sta,
			serv_sta,
			deli_order.id de_id
		FROM
			oms_order o
		LEFT JOIN deli_order ON o.order_sn = deli_order.order_sn
		ORDER BY
			o.id
	) a
WHERE
	member_id=$id";

if($keywords!==''){
	$sql.=" and (order_sn like '%$keywords%' or receiver_name like '%$keywords%')";
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