<?php
session_start();
if(isset( $_SESSION['username'] )){
	echo '1';
}else{
	echo 'alert("登录过时，请重新登录");location.href="http://cart.gmall.com:8084/cartList";';
}
