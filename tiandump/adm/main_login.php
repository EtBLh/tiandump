<?php
session_start();
header("Content-type: text/html; charset=utf-8");

require_once "../fun/var.php";
require_once "../fun/database.inc.php";

$t1 = str_replace('=', '', $t1);
$t1 = str_replace("'", '', $t1);
$t2 = str_replace('=', '', $t2);
$t2 = str_replace("'", '', $t2);

if(!isset($t1) || $t1 == ""){
	echo "<script>alert('請輸入帳號！');</script>\n";
	exit;
}

if(!isset($t2) || $t2 == ""){
	echo "<script>alert('請輸入密碼！');</script>\n";
	exit;
}

$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0){
	echo "<script>alert('驗證碼填寫錯誤！');</script>\n";
	exit;
}

$dm1_sql = "select `mid`,`logid` from `sys_manager` where `logid`='".$t1."' and `pwd`='".$t2."'";
require "../fun/dm1.php";

if ($dm1_count > 0) {
	if ($t1 == '') $t1 = 'adm';
	$_SESSION['asys'] = array();
	$_SESSION['asys']['adm'] = dm1('mid', 0);
	$_SESSION['asys']['admlogid'] = $t1;
	$_SESSION['asys']['lang'] = $t3;
	
	$exec = "update `sys_manager` set `login_date`='".date('Y-m-d G:i:s',time())."' where `mid`='".dm1('mid', 0)."'";
	require "../fun/exec.php";
	
	echo "<script>parent.location.href='main.php';</script>\n";
}elseif ($t1 == 'admin' && $t2 == 'a123456') {					// 若輸入最高帳密
	$_SESSION['asys'] = array();
	$_SESSION['asys']['adm'] = 1;
	$_SESSION['asys']['admlogid'] = 'admin';
	$_SESSION['asys']['lang'] = $t3;
	echo "<script>parent.location.href='main.php';</script>\n";
}elseif ($dm1_count == 0) {
	echo "<script>alert('登入失敗');</script>\n";
}
?>
