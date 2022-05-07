<?php
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require '../fun/safe_check.php';

require '../fun/var.php';
require '../fun/database.inc.php';


if($name == ""){
	echo "<script>alert('請填寫真實姓名！');</script>\n";
	exit;
}

if($byear == ""){
	echo "<script>alert('請填寫生日！');</script>\n";
	exit;
}
if($cellphone == ""){
	echo "<script>alert('請填寫行動電話！');</script>\n";
	exit;
}


if($address_city == ""){
	echo "<script>alert('請選擇縣市！');</script>\n";
	exit;
}
if($address_area == ""){
	echo "<script>alert('請選擇區域！');</script>\n";
	exit;
}
if($address == ""){
	echo "<script>alert('請填寫地址！');</script>\n";
	exit;
}

/*if ($pwd_new != "") {
	if(! preg_match('/^([a-zA-Z0-9]|[._]){8,16}$/', $pwd_new)){
		echo "<script>alert('密碼必須由8-16個英文字母、數字或字符.和_組成');</script>\n";
		exit;
	}
	if($pwd_new != $pwd_new2){
		echo "<script>alert('兩次密碼不同');</script>\n";
		exit;
	}
}

$dm1_sql = "select `memberid` from `member` where `memberid`='".$_SESSION['usys']['memberid']."' and `password`='".$pwd_old."'";
require "../fun/dm1.php";
if ($dm1_count == 0){
	echo "<script>alert('舊密碼填寫錯誤！');</script>\n";
	exit;
}*/
// ____________________________________________
$byear = strtotime($byear);
$exec = "update member set ";
//if($pwd_new != ""){
//	$exec .= "`password`='".$pwd_new."',";
//}
$exec .= "`name`='".$name."',";
$exec .= "`sex`='".$sex."',";
$exec .= "`byear`='".$byear."',";
$exec .= "`tel`='".$tel."',";
$exec .= "`cellphone`='".$cellphone."',";
$exec .= "`member_email`='".$member_email."',";
$exec .= "`address_city`='".$address_city."',";
$exec .= "`address_area`='".$address_area."',";
$exec .= "`address_zip`='".$address_zip."',";
$exec .= "`address`='".$address."'";
$exec .= " where `memberid`='".$_SESSION['usys']['memberid']."'";
require "../fun/exec.php";

echo "<script>alert('修改成功！');</script>\n";
//echo "parent.location.href='../../member_login.php';\n";
?>