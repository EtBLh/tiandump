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
<div id="info_bread"><a href="index.php">首頁</a> > <a href="member.php">會員中心</a> > 修改會員資料</div><!--info_bread end-->
<div id="login">
<div class="login_top"><img src="images/member-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>

<div id="news-left">
<ul>
<li><a href="member.php">修改會員資料</a></li>
<li><a href="member-check.php">填寫匯款通知</a></li>
</ul>
</div>
<div id="news-right">
<form name="member_modify_form" method="post" action="includes/member_modify.php" target="pagetmp">
<table class="form_table" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<th width="22%"><span class="red">*</span> 真實姓名：</th>
<td width="27%"><input class="name" name="name" value="<?php echo $name; ?>" /></td>
<td width="51%">
<label class="check" ><input name="sex" id="radio" value="0" checked="checked" type="radio" />先生</label>
<label class="check" ><input name="sex" id="radio" value="1" type="radio" <?php echo ($sex == 1) ? 'checked' : ''; ?> />小姐</label>
</td>
</tr>

<tr>
<th width="22%">生 日：</th>
<td width="27%"><input class="name date-pick" name="byear" value="<?php echo ($byear > 0) ? date('Y-m-d',$byear) : ''; ?>" /></td>
<td width="51%">&nbsp;(例：1980-01-01)</td>
</tr>

<tr>
<th width="22%">聯絡電話：</th>
<td width="27%"><input class="name" name="tel" value="<?php echo $tel; ?>" />
&nbsp;</td>
<td width="51%">&nbsp;(例：02-22345678)</td>
</tr>
<tr>
<th width="22%"><span class="red">*</span> 行動電話：</th>
<td width="27%"><input class="name" name="cellphone" value="<?php echo $cellphone; ?>"/>
&nbsp;</td>
<td width="51%">&nbsp;(例：0912345678)</td>
</tr>
<tr>
<th width="22%"><span class="red">*</span> Email：</th>
<td colspan="2"><input class="mail" name="member_email" value="<?php echo $member_email; ?>" />
&nbsp; (請輸入正確的Email) </td>
</tr>
<tr>
<th width="22%" style="vertical-align:top;"><span class="red">* </span>聯絡地址：</th>
<td colspan="2">
<select name="address_city" id="address_city" class="form_select zip"></select>
<select name="address_area" id="address_area" class="form_select zip"></select><br>
<input class="input add" id="address_zip"  name="address_zip" value="<?php echo $address_zip; ?>" style="width:40px; margin-right:5px;"/>
<input class="input add" id="textfield2"  name="address" value="<?php echo $address; ?>" style="width:225px" />
&nbsp; (請輸入正確的聯絡地址) </td>
</tr>

<tr>
<th width="22%">&nbsp;</th>
<td colspan="2"><div class="co"><a href="javascript:member_modify_form.submit();">確認修改</a></div></td>
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