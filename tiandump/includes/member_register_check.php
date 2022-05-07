<?php 
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require_once '../fun/safe_check.php';

require_once '../fun/var.php';
require_once '../fun/database.inc.php';


if(! preg_match('/^([a-zA-Z0-9]|[._]){6,12}$/', $reg_logid)){
	echo "<script>alert('請輸入由6-12個英文字母、數字或字符.和_組成的帳號！');</script>\n";
	exit;
}

$dm1_sql = "select `memberid` from `member` where `logid`='".$reg_logid."'";
require "../fun/dm1.php";
if ($dm1_count > 0){
	echo "<script>alert('這個帳號已被註冊，請重輸入！');</script>\n";
	exit;
}

if(! preg_match('/^([a-zA-Z0-9]|[._]){6,12}$/', $reg_pwd)){
	echo "<script>alert('密碼必須由6-12個英文字母、數字或字符.和_組成');</script>\n";
	exit;
}

if ($reg_pwd != $reg_pwd2) {
	echo "<script>alert('兩次密碼不同');</script>\n";
	exit;
}

/*

$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0):
	echo "<script>alert('Type the code shown error.');</script>\n";
	exit;
endif;*/
echo "	<form name=\"reg_form\" id=\"reg_form\" method=\"post\" action=\"../member-join.php\" target=\"_parent\">
			<input type=\"text\" name=\"go_url\" value=\"".$go_url."\">
			<input type=\"text\" name=\"reg_logid\" value=\"".$reg_logid."\">
			<input type=\"text\" name=\"reg_pwd\" value=\"".$reg_pwd."\">
			<input type=\"text\" name=\"reg_pwd2\" value=\"".$reg_pwd2."\">
		</form>";
echo "<script>reg_form.submit();</script>\n";
?>
