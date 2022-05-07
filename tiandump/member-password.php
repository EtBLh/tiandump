<?php
	session_start();
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
<script type="text/javascript" language="javascript">
function reloadImage(url){ 
	document.getElementById("codeimg").src= url + "?" + Math.random();
}
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
<div id="info_bread"><a href="index.php">首頁</a> > 忘記密碼</div><!--info_bread end-->
<div id="login">
<div class="login_top"><img src="images/password-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>


<div class="products-in_title" style="width:765px; margin-bottom:30px;">請填寫您的帳號及Email，系統將發送密碼至您的信箱。</div>
<form name="password_form" method="post" action="includes/member_lost_password.php" target="pagetmp">
<table class="form_table" width="780" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<th width="30%"><span class="red">* </span>帳 號</th>
<td width="70%"><input class="name" name="lost_logid" /></td>
</tr>
<tr>
<th width="30%"><span class="red">*</span> Email</th>
<td width="70%"><input class="mail" name="lost_email" /></td>
</tr>
<tr>
<th width="30%"><span class="red">*</span>&nbsp;驗證碼</th>
<td width="70%">
	<input class="code" name="jude" />
	<img id="codeimg" name="codeimg" src="fun/code.php" onclick="javascript:reloadImage('fun/code.php');" width="90" height="20" align="absbottom" />
</td>
</tr>
<tr>
<th width="30%">&nbsp;</th>
<td width="70%"><div class="co"><a href="javascript:password_form.submit();">確認送出</a></div></td>
</tr>
</table>
</form>
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