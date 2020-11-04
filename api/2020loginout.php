<?php
header('Content-Type:text/html; charset=utf-8');
//session 共享变量机制
session_start();

//清除SESSION登录标记
$_SESSION=[];

echo '<script>alert("退出成功，谢谢使用");location.href="/2020login.html";</script>';
