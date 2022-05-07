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
<div id="info_bread"><a href="index.php">首頁</a> > 聯絡我們</div><!--info_bread end-->
<div id="news">
<div class="login_top"><img src="images/shopping-tltie.jpg" width="200" height="41" style="margin-right:20px;" /><img src="images/login-pic.jpg" width="560" height="59" /></div>
<div id="news-right2">
  <div class="products-title_box3">
<div class="products-in_title">若您有任何意見或疑問，都歡迎使用以下聯絡表單與我們聯絡！</div>
</div>
<form name="contact_form" method="post" action="includes/contact.php" target="pagetmp">
<table class="form_table" width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
<tr>
<th width="25%"><span class="red">*</span> 姓 名：</th>
<td width="30%"><input class="name" name="name" /></td>
<td width="45%">
<input name="sex" id="radio" value="0" checked="checked" type="radio" />
男士
<input id="radio2" value="1" name="sex" type="radio" />
女士</td>
</tr>

<tr>
<th width="25%"><span class="red">* </span>電 話：</th>
<td width="30%"><input class="name" name="tel"/> </td>
<td width="45%">&nbsp;(例：02-22345678)</td>
</tr>

<tr>
<th width="25%"><span class="red">*</span> Email：</th>
<td colspan="2"><input class="mail" name="email" /></td>
</tr>

<tr>
<th width="25%"><span class="red">*</span>意見主題：</th>
<td colspan="2"><input class="subject" name="subject" /></td>
</tr>

<tr>
<th width="25%" style="vertical-align:top;"><span class="red">*</span> 意見內容：</th>
<td colspan="2"><textarea id="textarea" class="comment" name="message" rows="5" cols="50"></textarea></td>
</tr>

<tr>
<th width="25%"><span class="red">*</span>&nbsp;驗證碼：</th>
<td colspan="2">
	<input class="code" type="text" name="jude" />
	<img id="codeimg" name="codeimg" src="fun/code.php" onclick="javascript:reloadImage('fun/code.php');" width="90" height="24" align="absbottom" />
</td>
</tr>

<tr>
<th width="25%">&nbsp;</th>
<td colspan="2">
<div class="co"><a href="javascript:contact_form.submit();">確認送出</a></div>
<div class="co"><a href="javascript:contact_form.reset();">清除重填</a></div>
</td>
</tr>
</table>
</form>
<div class="products-title_box2">
<div class="products-in_title">地理位置</div>
</div>
<div class="products-detail_box">
<div class="map-left">
<h1>天字號水餃店</h1>
<p>桃園市龍潭區梅龍路515巷85-1號</p>
<p>服務專線 / 03-4705685</p>
<p>服務專線 / 0955-309957</p>
</div>
<div class="map-right">
<iframe width="310" style="border:#CCC 1px solid;" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2422.8150667692275!2d121.19204156499903!3d24.875737791768344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34683c94f13c8375%3A0x2a268f19929a7e89!2zMzI15qGD5ZyS5biC6b6N5r2t5Y2A5YWr5b636YeM!5e0!3m2!1szh-TW!2stw!4v1645228887283!5m2!1szh-TW!2stw"></iframe><br /><small><a href="https://www.google.com.tw/maps/place/325%E6%A1%83%E5%9C%92%E5%B8%82%E9%BE%8D%E6%BD%AD%E5%8D%80%E5%85%AB%E5%BE%B7%E9%87%8C/@24.8757378,121.1920416,17.58z/data=!4m5!3m4!1s0x34683c94f13c8375:0x2a268f19929a7e89!8m2!3d24.8760682!4d121.1914507?hl=zh-TW" style="color:#0000FF;text-align:left"></a></small>
</div>
</div><!--products-detail_box-->

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


//<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2422.8150667692275!2d121.19204156499903!3d24.875737791768344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34683c94f13c8375%3A0x2a268f19929a7e89!2zMzI15qGD5ZyS5biC6b6N5r2t5Y2A5YWr5b636YeM!5e0!3m2!1szh-TW!2stw!4v1645228887283!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>