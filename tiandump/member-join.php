<?php
	session_start();
	require_once "fun/var.php";
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
		AddressInit("reg_address_city","reg_address_area","reg_address_zip","<?php echo $member_city ?>","<?php echo $member_area ?>") ;
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
<div id="info_bread"><a href="index.php">首頁</a> > 加入會員</div><!--info_bread end-->
<div id="login">
<div class="login_top"><img src="images/join-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>


<div class="products-in_title" style="width:765px; margin-bottom:30px;">星號部分為必填欄位。</div>
<form name="reg_form" action="includes/member_register.php" method="post" target="pagetmp">
<table class="form_table" width="780" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
  <th width="30%"><span class="red">*</span> 真實姓名：</th>
  <td width="21%"><input class="name" name="reg_name" /></td>
  <td width="49%">
    <label class="check" ><input name="reg_sex" id="radio" value="0" checked="checked" type="radio" />
    先生</label>
    <label class="check" ><input id="radio2" value="1" name="reg_sex" type="radio"/>
    小姐</label>
  </td>
</tr>

<tr>
<th width="30%">生 日：</th>
<td width="21%"><input class="name date-pick" name="reg_byear"/></td>
<td width="49%">&nbsp;(例：1980-01-01)</td>
</tr>

<tr>
  <th width="30%">聯絡電話：</th>
  <td width="21%"><input class="name" name="reg_tel" />
  &nbsp;</td>
  <td width="49%">&nbsp;(例：02-22345678)</td>
</tr>
<tr>
<th width="30%"><span class="red">*</span> 行動電話：</th>
<td width="21%"><input class="name" name="reg_cellphone"/>
&nbsp;</td>
<td width="49%">&nbsp;(例：0912345678)</td>
</tr>
<tr>
  <th width="30%"><span class="red">*</span> Email：</th>
  <td colspan="2"><input class="mail" name="reg_email" />
    &nbsp; (請輸入正確的Email) </td>
</tr>
<tr>
  <th width="30%" style="vertical-align:top;"><span class="red">* </span>聯絡地址：</th>
  <td colspan="2">
    <select name="reg_address_city" id="reg_address_city" class="form_select zip"></select>
    <select name="reg_address_area" id="reg_address_area" class="form_select zip" ></select><br>
  	<input class="name" id="reg_address_zip"  name="reg_address_zip" style="width:40px; margin-right:5px;"/>
  	<input class="name" id="textfield2"  name="reg_address" style="width:225px"/>
  &nbsp; (請輸入正確的聯絡地址) </td>
</tr>

<tr>
  <th width="30%">&nbsp;</th>
  <td colspan="2"><div class="co"><a href="javascript:reg_form.submit();">確認送出</a></div></td>
</tr>
</table>
<input type="hidden" name="go_url" value="<?php echo $go_url; ?>" />
<input type="hidden" name="reg_logid" value="<?php echo $reg_logid; ?>" />
<input type="hidden" name="reg_pwd" value="<?php echo $reg_pwd; ?>" />
<input type="hidden" name="reg_pwd2" value="<?php echo $reg_pwd; ?>" />
</form>
</div>
</div><!--info-con end-->

<div id="footer">
<?php include("include/footer.php"); ?>
</div><!--footer end-->

</div><!--wrapper end-->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>-->
<script src="scripts/main.js"></script>
<script src="scripts/all.js"></script>

</body>
</html>