<?php
	session_start();
	require_once "includes/cart_unlogin_check.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ZH" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-tw">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="水餃,水餃店,高麗菜水餃,蔥燒水餃餃,玉米水餃,韭菜水餃,台南市,新化,天字號"/>
<title>天字號水餃店</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
<div id="header">
<?php include("include/top-menu.php"); ?>

<div id="header_menu">
<?php include("include/menu.php"); ?>
</div><!--header_menu end-->
</div><!--header end-->

<div id="info-con">
<div id="info_bread"><a href="index.php">首頁</a> > <a href="order.php">線上訂購</a> > <a href="order2.php">填寫資料</a> > 完成訂購</div><!--info_bread end-->
<div id="news">
<div id="news-left"><img src="images/order-icon.jpg" />
<a class="topp" href="#"><img src="images/products3-icon.jpg" /></a>
</div>
<div id="news-right">

<table class="order" width="600" cellpadding="0" cellspacing="0" border="">
<tr>
<th colspan="5"><span class="red2">第一步 選擇商品 >> 第二步 填寫資料 >> </span>完成訂購</th></tr>
<tr>
</table><!---------------->
<?php 
if($pw == 1){ 
	require_once "includes/config.php";
	require_once "includes/get_atm_info.php";
?>
<div class="cart_complete"><!--ATM轉帳付款-->
<p>訂單編號：<?php echo $od; ?></p>
<p>感謝您的購買，請於匯款完成後填寫匯款通知</p>
<p>收到您的匯款後，將儘速為您寄出商品</p>
<p>&nbsp;</p>
<h1>匯 款 資 訊</h1>
<table width="300" border="0" cellpadding="0" cellspacing="10">
<tr><td align="right">匯款銀行：</td>
<td width="65%" align="left"><?php echo $bank_name?></td></tr>
<tr><td align="right">銀行代號：</td>
<td width="65%" align="left"><?php echo $bank_no?></td></tr>
<tr><td align="right">帳戶戶名：</td><td width="65%" align="left"><?php echo $card_name?></td></tr>
<tr><td align="right">匯款帳號：</td>
<td width="65%" align="left"><?php echo $card_no?></td></tr>
</table>
</div>
<?php }else{ ?>
<div class="cart_complete"><!--貨到付款-->
<p>訂單編號：<?php echo $od; ?></p>
<p>感謝您的購買，</p>
<p>我們將儘速為您寄出商品 </p>
</div>
<?php } ?>
</div>
</div><!--news end-->
</div><!--info-con end-->

<div id="footer">
<?php include("include/footer.php"); ?>
</div><!--footer end-->

</div><!--wrapper end-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="scripts/main.js"></script>
<script src="scripts/all.js"></script>

</body>
</html>