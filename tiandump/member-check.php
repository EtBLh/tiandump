<?php
	session_start();
	require_once "includes/member_center_check.php";
	require_once "includes/config.php";
	include("includes/member_data.php");
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
	
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery-ui.min.js"></script>
<script src="scripts/AddressList.js"></script>
	
<link rel="stylesheet" href="fun/date/css/jquery.ui.all.css">
<script src="fun/date/js/jquery-1.6.2.js"></script>
<script src="fun/date/js/jquery.ui.core.js"></script>
<script src="fun/date/js/jquery.ui.datepicker.js"></script>
<script>
	$(function(){
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd"});
		AddressInit("address_city","address_area","address_zip","<?php echo $address_city ?>","<?php echo $address_area ?>") ;
	}) ;
</script>
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
<div id="info_bread"><a href="index.php">首頁</a> > <a href="member.php">會員中心</a> > 填寫匯款通知</div><!--info_bread end-->
<div id="login">
<div class="login_top"><img src="images/member-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>

<div id="news-left">
<ul>
<li><a href="member.php">修改會員資料</a></li>
<li><a href="member-check.php">填寫匯款通知</a></li>
</ul>
</div>
<div id="news-right">
<form name="paynote_form" method="post" action="includes/paynote_send.php" target="pagetmp">
<table class="form_table" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
  <th width="25%"><span class="red">*</span> 訂單編號：</th>
  <td width="28%"><input class="name" name="ordersno" /></td>
  <td width="47%">&nbsp;</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span> 會員姓名：</th>
  <td width="28%"><input class="name" name="name" value="<?php echo $name?>" /></td>
  <td width="47%">&nbsp;</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span> 訂購日期：</th>
  <td width="28%"><input class="name date-pick" name="orderdate" /></td>
  <td width="47%">&nbsp;(例：2012-01-01)</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span> 訂單金額：</th>
  <td width="28%"><input class="name" name="order_total" /></td>
  <td width="47%">&nbsp;(例：1980元)</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span> 匯出銀行代碼：</th>
  <td width="28%"><input class="name" name="bank_no" /></td>
  <td width="47%">&nbsp;(例：郵局700)</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span>匯出銀行後五碼：</th>
  <td width="28%"><input class="name" name="bank_order_no" /></td>
  <td width="47%">&nbsp;</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span> 聯絡電話：</th>
  <td width="28%"><input class="name" name="phone"/>
  &nbsp;</td>
  <td width="47%">&nbsp;&nbsp;(若款項有任何問題，可隨時聯絡上)</td>
</tr>
<tr>
  <th width="25%"><span class="red">*</span>聯絡地址：</th>
  <td colspan="2">
  	<select name="address_city" id="address_city" class="form_select zip"></select>
	<select name="address_area" id="address_area" class="form_select zip"></select><br>
	<input class="input add" id="address_zip"  name="address_zip" value="<?php echo $address_zip; ?>" style="width:40px; margin:15px 5px 0 0;"/>
	<input class="input add" id="textfield2"  name="address" value="<?php echo $address; ?>" style="width:225px; margin:15px 0 0 0;" />
  </td>
</tr>
<tr>
  <th width="25%" style="vertical-align:top;">備註：</th>
  <td colspan="2"><textarea id="textarea" class="comment" name="message" rows="5" cols="40"></textarea></td>
</tr>

<tr>
  <th width="25%">&nbsp;</th>
  <td colspan="2"><div class="co"><a href="javascript:paynote_form.submit();">確認送出</a></div></td>
</tr>
</table>
</form>
</div>
</div><!--news end-->

</div><!--info-con end-->

<div id="footer">
<?php include("include/footer.php"); ?>
</div><!--footer end-->

</div><!--wrapper end-->

<script src="scripts/main.js"></script>
<script src="scripts/all.js"></script>

</body>
</html>