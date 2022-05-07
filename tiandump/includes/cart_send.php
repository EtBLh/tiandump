<?php
session_start();
header("Content-type: text/html; charset=utf-8");

//=========安全檢查=========================
require '../fun/safe_check.php';

require '../fun/var.php';
require '../fun/database.inc.php';


if(empty($_SESSION['usys']['memberid'])){
	echo "<script>alert('請登入會員！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if(count($_SESSION['usys']['cart']) == 0){
	echo "<script>alert('購物車中無選購商品！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if(! isset($_SESSION['usys']['payway']) || empty($_SESSION['usys']['payway'])){
	echo "<script>alert('請選擇結賬方式！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}

if($name == ""){
	echo "<script>alert('請填寫購買人姓名！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}

if($phone == ""){
	echo "<script>alert('請填寫購買人手機號碼！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if($address_city == "" || $address_area == ""){
	echo "<script>alert('請選擇購買人縣市！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if($address == ""){
	echo "<script>alert('請填寫購買人地址！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}

if($r_name == ""){
	echo "<script>alert('請填寫收件人姓名！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if(! isset($r_phone) || $r_phone == ""){
	echo "<script>alert('請填寫收件人手機號碼！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
if($r_address_city == "" || $r_address_area == ""){
	echo "<script>alert('請填寫收件人縣市！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}

if(! isset($r_address) || $r_address == ""){
	echo "<script>alert('請填寫收件人地址！');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}
//if($liketime==""){
//	echo "<script>alert('請選擇希望到貨時間！');</script>\n";
//	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
//	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
//	exit;
//}

/*
$jude2 =$_SESSION['randcode'];
if($jude != $jude2){
	echo "<script>alert('驗證碼填寫錯誤,請注意字母須大寫。');</script>\n";
	echo "<script>parent.document.getElementById(\"button_div\").style.display=\"block\";</script>\n";
	echo "<script>parent.document.getElementById(\"submit_div\").style.display=\"none\";</script>\n";
	exit;
}*/

//======保存訂單========================================================================================================================================================
$byear = strtotime($byear);
$ordersno = "OD" . time() . rand(10,99);
$orderdate = time();
$exec = "insert into `orders` (`ordersno`,`memberid`,`member_email`,`name`,`sex`,`phone`,`byear`,`address_city`,`address_area`,`address_zip`,`address`,`r_name`,`r_sex`,`r_phone`,`r_address_city`,`r_address_area`,`r_address_zip`,`r_address`,`liketime`,`note`,`payway`,`orderdate`,`orderflag`,`lang`) values (";
$exec .= "'".$ordersno."',";
$exec .= "'".$_SESSION['usys']['memberid']."',";
$exec .= "'".$member_email."',";
$exec .= "'".$name."',";
$exec .= "'".$sex."',";
$exec .= "'".$phone."',";
$exec .= "'".$byear."',";
$exec .= "'".$address_city."',";
$exec .= "'".$address_area."',";
$exec .= "'".$address_zip."',";
$exec .= "'".$address."',";
$exec .= "'".$r_name."',";
$exec .= "'".$r_sex."',";
$exec .= "'".$r_phone."',";
$exec .= "'".$r_address_city."',";
$exec .= "'".$r_address_area."',";
$exec .= "'".$r_address_zip."',";
$exec .= "'".$r_address."',";
$exec .= "'".$liketime."',";
$exec .= "'".$note."',";
$exec .= "'".$_SESSION['usys']['payway']."',";
$exec .= "'".$orderdate."',";
$exec .= "'0',";
$exec .= "'1')";
require "../fun/exec.php";
$ordersid = mysql_insert_id();

//======保存購買商品===========================================================================================================================
$sn = 1;
$shop_list_str = "";
$shop_count = count($_SESSION['usys']['cart']);
for ($i=0; $i<$shop_count; $i++){
	$dm1_sql = "select * from `products` where `productid`='".$_SESSION['usys']['cart'][$i][0]."'";
	require "../fun/dm1.php";
	$idx = 0;
	require "../fun/getdata.php";
	
	$product_total_xiaoji = intval($product_price2) * intval($_SESSION['usys']['cart'][$i][1]);//金額小計
	$product_total += $product_total_xiaoji;//商品總計
	
	$exec = "insert into `orders_data` (`ordersid`,`productid`,`product_name`,`product_package`,`buy_price`,`qty`,`sums`,`lang`) values (";
	$exec .= "'".$ordersid."',";
	$exec .= "'".$_SESSION['usys']['cart'][$i][0]."',";
	$exec .= "'".$product_name."',";
	$exec .= "'".$_SESSION['usys']['cart'][$i][2]."',";
	$exec .= "'".$product_price2."',";
	$exec .= "'".$_SESSION['usys']['cart'][$i][1]."',";
	$exec .= "'".$product_total_xiaoji."',";
	$exec .= "'1')";
	echo $exec;
	require "../fun/exec.php";
	
	
	//==========================生成郵件購買商品列表=======================================================
    $shop_list_str .= '
        				<tr>
			             <td align="center" style="border-bottom:1px solid #ddd;padding:0 8px">'.$product_name.'</td>
			             <td align="center" style="border-bottom:1px solid #ddd;padding:0 8px">'.$_SESSION['usys']['cart'][$i][2].'</td>
			        	 <td align="center" style="border-bottom:1px solid #ddd;padding:0 8px">'.$_SESSION['usys']['cart'][$i][1].'</td>
			             <td align="center" style="border-bottom:1px solid #ddd;padding:0 8px">'.$product_price.'</td>
						 <td align="center" style="border-bottom:1px solid #ddd;padding:0 8px">'.$product_total_xiaoji.'</td>
			           </tr>
    ';
}


//============計算運費和手續費==========================================================================================
$dm1_sql = "select * from `orders_set` where `lang`='1'";
require "../fun/dm1.php";
if($dm1_count > 0){
	$set_ship_total = dm1('ship_total',0);
	$set_ship_line_total = dm1('ship_line_total',0);
	$set_cod_total = dm1('cod_total',0);
	$set_cod_line_total = dm1('cod_line_total',0);
}else{
	$set_ship_total = 0;
	$set_ship_line_total = 0;
	$set_cod_total = 0;
	$set_cod_line_total = 0;
}
$ship_total = ($product_total >= $set_ship_line_total) ? 0 : $set_ship_total;
$cod_total = ($product_total >= $set_cod_line_total) ? 0 : $set_cod_total;

//==================計算最後總金額=========================================================================
$sub_total = intval($product_total) + intval($ship_total)+ intval($cod_total);// 

//==========更新訂單金額=====================================================================================================================
$exec = "update `orders` set ";
$exec .= "`product_total`='".$product_total."',";
$exec .= "`ship_total`='".$ship_total."',";
$exec .= "`cod_total`='".$cod_total."',";
$exec .= "`order_total`='".$sub_total."'";
$exec .= " where `ordersid`='".$ordersid."'";
require "../fun/exec.php";



//============發送郵件=============================================================================================================================
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

require "cart_send_Email.php";

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

	$mail->Subject = "天字號水餃店網站「線上訂購」訂單信息"; //設定郵件標題
	$mail->Body = $body;         
	$mail->IsHTML(true); //設定郵件內容為HTML
	
	$mail->From = $send_email; //設定寄件者信箱
	$mail->FromName = $send_name; //設定寄件者姓名
	
	$mail->AddAddress($member_email, $name); //設定收件者郵件及名稱
	$mail->Send();
	$mail->ClearAddresses();
	
	$receive_email_array = explode(";",$receive_email);
	$receive_email_count = count($receive_email_array);
	for($i=0;$i<$receive_email_count;$i++){
		$mail->AddAddress($receive_email_array[$i], $receive_name); //設定收件者郵件及名稱
		if(!$mail->Send()){ }
		$mail->ClearAddresses();
	}
}else{
	$send_name  = "=?utf-8?B?" . base64_encode($send_name) . "?=";
	$subject  = "=?utf-8?B?" . base64_encode("天字號水餃店網站「線上訂購」訂單信息") . "?="; 
	$header  = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: $send_name<$send_email> \r\n";
	mail($_SESSION['usys']['member_email'], $subject, $body, $header);
	
	$receive_email_array = explode(";",$receive_email);
	$receive_email_count = count($receive_email_array);
	for($i=0;$i<$receive_email_count;$i++){
		mail($receive_email_array[$i], $subject, $body, $header);
	}
}

//=================對id進行加密=======================
//require_once "../fun/encryption_class.php"; //加密解密類
//$extstr = new funCrypt(); //建立新物件
//$oid = time().$ordersid;
//$oid = $extstr->enCrypt($oid,'efCIJK67r89VL'); 

//	echo "<script>alert('感謝您的訂購，我們將儘快為您處理！');</script>\n";
echo "<script>parent.location.href='../order-complete.php?od=".$ordersno."&pw=".$_SESSION['usys']['payway']."';</script>\n";

//unset($_SESSION['usys']['cart']); 
//unset($_SESSION['usys']['payway']);
?>