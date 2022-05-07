<?php 
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require_once '../fun/safe_check.php';

require_once '../fun/var.php';
require_once '../fun/database.inc.php';


if($lost_logid == ""){
	echo "<script>alert('請輸入帳 號！');</script>\n";
	exit;
}

if(! preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/',$lost_email)){
	echo "<script>alert('請輸入正確的Email！');</script>\n";
	exit;
}


$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0){
	echo "<script>alert('驗證碼填寫錯誤！');</script>\n";
	exit;
}

// ____________________________________________

$dm1_sql = "select `password`,`name` from `member` where `member_email`='".$lost_email."' and `logid`='".$lost_logid."'";
require "../fun/dm1.php";
if ($dm1_count == 0){
	echo "<script>alert('找不到符合條件的帳號！');</script>\n";
	exit;
}
$password = dm1('password',0);
$name = dm1('name',0);
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

require "member_lost_passwordEmail.php";
if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
	$smtp_check = ($smtp_check == 0) ? false : true;

	include("../fun/phpMailer/class.phpmailer.php"); //匯入PHPMailer類別        
      
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

 
	$mail->Subject = "天字號水餃店網站「忘記密碼」帳號信息"; //設定郵件標題
	$mail->Body = $body;         
	$mail->IsHTML(true); //設定郵件內容為HTML
	
	$mail->From = $send_email; //設定寄件者信箱
	$mail->FromName = $send_name; //設定寄件者姓名
	
	$mail->AddAddress($lost_email, $name); //設定收件者郵件及名稱
	if(!$mail->Send()){
		echo "<script>alert(\"密碼找回信件發送失敗，請重試！\");</script>\n"; 
		exit;
	}else{
		echo "<script>alert(\"密碼找回成功，已發送至您註冊時的電子信箱中！\");</script>\n"; 
	}
	$mail->ClearAddresses();
}else{
	$send_name  = "=?utf-8?B?" . base64_encode($send_name) . "?=";
	$subject  = "=?utf-8?B?" . base64_encode("天字號水餃店網站「忘記密碼」帳號信息") . "?="; 
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: $send_name<$send_email> \r\n";
	mail($lost_email, $subject, $body, $header);
	echo "<script>alert(\"密碼找回成功，已發送至您註冊時的電子信箱中！\");</script>\n"; 
}
echo "<script>parent.location.href='../login.php';</script>\n";
?>
