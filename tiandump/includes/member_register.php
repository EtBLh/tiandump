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

if(! isset($reg_name) || $reg_name == ""){
	echo "<script>alert('請填寫真實姓名！');</script>\n";
	exit;
}

if(! isset($reg_cellphone) || $reg_cellphone == ""){
	echo "<script>alert('請填寫行動電話！');</script>\n";
	exit;
}
if(! isset($reg_address_city) || $reg_address_city == ""){
	echo "<script>alert('請選擇縣市！');</script>\n";
	exit;
}
if(! isset($reg_address_area) || $reg_address_area == ""){
	echo "<script>alert('請選擇區域！');</script>\n";
	exit;
}
if(! isset($reg_address) || $reg_address == ""){
	echo "<script>alert('請填寫地址！');</script>\n";
	exit;
}
/*
$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0){
	echo "<script>alert('Type the code shown error.');</script>\n";
	exit;
}
*/
// ____________________________________________
$byear = strtotime($byear);
$addingdate = time();
$exec = "insert into member (`logid`,`password`,`name`,`sex`,`byear`,`tel`,`cellphone`,`member_email`,`address_city`,`address_area`,`address_zip`,`address`,`addingdate`,`isopen`,`lang`) values (";
$exec .= "'".$reg_logid."',";
$exec .= "'".$reg_pwd."',";
$exec .= "'".$reg_name."',";
$exec .= "'".$reg_sex."',";
$exec .= "'".$reg_byear."',";
$exec .= "'".$reg_tel."',";
$exec .= "'".$reg_cellphone."',";
$exec .= "'".$reg_email."',";
$exec .= "'".$reg_address_city."',";
$exec .= "'".$reg_address_area."',";
$exec .= "'".$reg_address_zip."',";
$exec .= "'".$reg_address."',";
$exec .= "'".$addingdate."',";
$exec .= "'0',";
$exec .= "'1')";
require "../fun/exec.php";
$memberid = mysql_insert_id();

//===========自動登入會員帳號===================================================
if (! isset($_SESSION['usys'])){
	session_register('usys');
	$_SESSION['usys'] = array();
	$_SESSION['usys']['memberid'] = $memberid;			// 用戶編號
//	$_SESSION['usys']['hi_name'] = $reg_email;			// 帳號
	$_SESSION['usys']['cart'] = array();		/*******購物車參數說明
												0.產品編號
												1.數量
												2.包裝
												*****/

}else{
	$_SESSION['usys']['memberid'] = $memberid;			// 用戶編號
//	$_SESSION['usys']['hi_name'] = $reg_email;			// 帳號
}


//============發送郵件====================================================================================================
$dm1_sql = "select * from sys_smtp where lang='1'";
require "../fun/dm1.php";
if($dm1_count > 0){
	$send_name = dm1('send_name',0);
	$send_email = dm1('send_email',0);
	$receive_name = dm1('receive_name',0);
	$receive_email = dm1('receive_email',0);
	$smtp_hosting = dm1('smtp_hosting',0);
	$smtp_port = dm1('smtp_port',0);
	$smtp_check = dm1('smtp_check',0);
	$smtp_user = dm1('smtp_user',0);
	$smtp_password = dm1('smtp_password',0);
	$smtp_secure = dm1('smtp_secure',0);
}
if ($send_name == ""){
	$send_name = "WEB";
}
if ($send_email == ""){
	$send_email = "web@".$_SERVER["HTTP_HOST"];
}
if ($receive_name == ""){
	$receive_name = "WEB";
}
if ($receive_email == ""){
	$receive_email = "web@".$_SERVER["HTTP_HOST"];
}

if($smtp_hosting == ""){
	$smtp_hosting = "localhost";
}

if($smtp_port == ""){
	$smtp_port = "25";
}

if($smtp_check == ""){
	$smtp_check = 0;
}

require "member_register_email.php";
if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
	$smtp_check = ($smtp_check == 0) ? false : true;

	require "../fun/phpMailer/class.phpmailer.php"; //匯入PHPMailer類別        
      
	$mail= new PHPMailer(); //建立新物件
	$mail->IsSMTP(); //設定使用SMTP方式寄信
	$mail->SMTPDebug = 0; // 启用SMTP调试功能 0=關閉調試 1 = errors and messages 2 = messages only
	$mail->SMTPAuth = $smtp_check; //設定SMTP需要驗證
	if($smtp_secure != ''){
		$mail->SMTPSecure = $smtp_secure;//設定連接方式，通常不需要設定，但是有的郵件服務器是通過ssl連接就需要 ，如gmail
	}
	
	$mail->Host = $smtp_hosting; //Gamil的SMTP主機：smtp.gmail.com  其它主機：onetoall.com.tw
	$mail->Username = $smtp_user; //設定驗證帳號：rzingwu@gmail.com 其他主機： onetoall@onetoall.com.tw
	$mail->Password = $smtp_password; //設定驗證密碼：wll1983812    其他主機：a123456
	$mail->Port = $smtp_port;  //Gamil的SMTP主機的SMTP埠位為465埠。 其他端口：25
	$mail->CharSet = "utf-8"; //設定郵件編碼
	$mail->Encoding = "base64"; //設定郵件編碼 Sets the Encoding of the message.

 
	$mail->Subject = "天字號水餃店網站「會員註冊」帳號信息"; //設定郵件標題
	$mail->Body = $body;         
	$mail->IsHTML(true); //設定郵件內容為HTML
	
	$mail->From = $send_email; //設定寄件者信箱
	$mail->FromName = $send_name; //設定寄件者姓名
	
	$mail->AddAddress($reg_email, $reg_name); //設定收件者郵件及名稱
	if(!$mail->Send()){

	}
	$mail->ClearAddresses();
}else{
	$send_name  = "=?utf-8?B?" . base64_encode($send_name) . "?=";
	$subject  = "=?utf-8?B?" . base64_encode("天字號水餃店網站「會員註冊」帳號信息") . "?="; 
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: $send_name<$send_email> \r\n";
	mail($reg_email, $subject, $body, $header);
}
if($go_url == "shopping"){
	echo "<script>parent.location.href='../order2.php';</script>\n";
}else{
	echo "<script>parent.location.href='../member.php';</script>\n";
}
?>