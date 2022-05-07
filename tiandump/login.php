<?php
session_start();
include("includes/member_login_check.php");
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
<div id="info_bread"><a href="index.php">首頁</a> > 會員登入</div><!--info_bread end-->
<div id="login">
<div class="login_top"><img src="images/login-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>
<div class="login_left">
<div class="title">會員登入</div>
<div class="text_left">
<form name="member_login" method="post" action="includes/member_login.php" target="pagetmp">
<table class="form_table2" width="370" cellpadding="0" cellspacing="0" border="0">
<tr>
<th width="25%">帳號：</th>
<td width="46%"><input type="text" name="login_logid" class="login" /></td>
<td width="29%">&nbsp;</td>
</tr>
<tr>
<th width="25%">密碼：</th>
<td width="46%"><input type="password" name="login_pwd" class="login" /></td>
<td width="29%"><div class="co" style="float:right; margin:0 25px 0 0; "><a href="member-password.php">忘記密碼</a></div></td>
</tr>
<tr>
<th width="25%">&nbsp;</th>
<td width="46%"><div class="co" style="margin:0 0 3px 0;"><a href="javascript:member_login.submit();">登入</a></div></td>
<td width="29%"></td>
</tr>
</table>
<input type="hidden" name="go" value="<?php echo $go; ?>" />
</form>
</div>
</div><!--login_left end-->

<div class="login_right">
<div class="title">加入會員</div>
<div class="text_left">
<form name="reg_form" action="includes/member_register_check.php" method="post" target="pagetmp">
<table class="form_table2" width="390" cellpadding="0" cellspacing="0" border="0">
<tr>
<th width="25%">帳號：</th>
<td width="36%"><input type="text" name="reg_logid" class="login" /></td>
<td width="39%">(6-12個英、數文組合)</td>
</tr>
<tr>
<th width="25%">密碼：</th>
<td width="36%"><input type="password" name="reg_pwd" class="login" /></td>
<td width="39%">(6-12個英、數文組合)</td>
</tr>
<tr>
<th width="25%">確認密碼：</th>
<td width="36%"><input type="password" name="reg_pwd2" class="login" /></td>
<td width="39%">(請再輸入一次密碼)</td>
</tr>
<tr>
<th width="25%">&nbsp;</th>
<td width="36%"><div class="co" style="margin:0 0 3px 0;"><a href="javascript:reg_form.submit();">下一步</a></div></td>
<td width="39%"></td>
</tr>
</table>
<input type="hidden" name="go_url" value="<?php echo $go; ?>" />
</form>
</div>
</div><!--login_right end-->
</div>
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