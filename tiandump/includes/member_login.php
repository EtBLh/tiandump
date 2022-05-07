<?php
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require_once '../fun/safe_check.php';

require_once '../fun/var.php';
require_once '../fun/database.inc.php';


if($_SESSION['usys']['memberid'] !=''){
	echo "<script>alert('您已經登入會員，如果需要重新登入請先登出')</script>;\n";
	exit;
}
/*
$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0){
	echo "<script>alert('驗證碼錯誤');</script>\n";
	exit;
}
*/
$dm1_sql = "select `memberid`,`name`,`isopen` from `member` where `logid`='$login_logid' and `password`='$login_pwd'";
require "../fun/dm1.php";
if ($dm1_count == 0){
	echo "<script>alert('帳號或密碼錯誤')</script>;\n";
	exit;
}

$memberid = dm1('memberid', 0);
$name = dm1('name', 0);
$isopen = dm1('isopen', 0);
if($isopen == 1){
	echo "<script>alert('您的會員功能被關閉，請與網站客服聯係')</script>;\n";
	exit;
}

if (! isset($_SESSION['usys'])){
	session_register('usys');
	$_SESSION['usys'] = array();
	$_SESSION['usys']['memberid'] = $memberid;	// 用戶編號
	$_SESSION['usys']['hi_name'] = $name;		// 真是姓名
	$_SESSION['usys']['cart'] = array();		/*******購物車參數說明
												0.產品編號
												1.數量
												2.包裝
												*****/
}else{
	$_SESSION['usys']['memberid'] = $memberid;	// 用戶編號
	$_SESSION['usys']['hi_name'] = $name;		// 真是姓名
}

if($go == "shopping"){
	echo "<script>parent.location.href='../order2.php';</script>\n";
}else{
	echo "<script>parent.location.href='../member.php';</script>\n";
}
?>
