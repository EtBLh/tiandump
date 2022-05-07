<?php 
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require_once '../fun/safe_check.php';

require_once '../fun/var.php';
require_once '../fun/database.inc.php';


if($name == ""){
	echo "<script>alert('請填寫姓名！');</script>\n";
	exit;
}

if($tel == ""){
	echo "<script>alert('請填寫電話！');</script>\n";
	exit;
}
if(! preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/',$email)){
	echo "<script>alert('請填寫正確的Email！');</script>\n";
	exit;
}
if($subject == ""){
	echo "<script>alert('請填寫您的意見主旨！');</script>\n";
	exit;
}

if(! isset($message) || $message == ""){
	echo "<script>alert('請填寫您的意見！');</script>\n";
	exit;
}

$jude2 =$_SESSION['randcode'];
if(strcmp(strtolower($jude),strtolower($jude2)) != 0){
	echo "<script>alert('驗證碼填寫錯誤！');</script>\n";
	exit;
}

// ____________________________________________

$send_date = time();
$exec = "insert into contact (`name`,`sex`,`tel`,`email`,`subject`,`message`,`send_date`,`lang`) values (";
$exec .= "'".$name."',";
$exec .= "'".$sex."',";
$exec .= "'".$tel."',";
$exec .= "'".$email."',";
$exec .= "'".$subject."',";
$exec .= "'".$message."',";
$exec .= "'".$send_date."',";
$exec .= "'1')";
require "../fun/exec.php";

//============發送郵件====================================================================================================
$dm1_sql = "select * from `sys_smtp` where `lang`='1'";
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

require "contact_Email.php";
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

 
	$mail->Subject = "天字號水餃店網站「聯絡我們」信息"; //設定郵件標題
	$mail->Body = $body;         
	$mail->IsHTML(true); //設定郵件內容為HTML
	
	$mail->From = $send_email; //設定寄件者信箱
	$mail->FromName = $send_name; //設定寄件者姓名
	
	$receive_email_array = explode(";",$receive_email);
	$receive_email_count = count($receive_email_array);
	for($i=0;$i<$receive_email_count;$i++){
		$mail->AddAddress($receive_email_array[$i], $receive_name); //設定收件者郵件及名稱
		if(!$mail->Send()){ }
		$mail->ClearAddresses();
	}
}else{
	$send_name  = "=?utf-8?B?" . base64_encode($send_name) . "?=";
	$subject  = "=?utf-8?B?" . base64_encode("天字號水餃店網站「聯絡我們」信息") . "?="; 
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: $send_name<$send_email> \r\n";
	$receive_email_array = explode(";",$receive_email);
	$receive_email_count = count($receive_email_array);
	for($i=0;$i<$receive_email_count;$i++){
		mail($receive_email_array[$i], $subject, $body, $header);
	}
}

echo "<script>alert(\"提交成功，感謝您的意見！\");</script>\n"; 
echo "<script>parent.location.href=parent.location.href;</script>\n";
?>