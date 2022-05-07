<?php
	session_start();
	require_once "includes/config.php";
	include("includes/news_data.php");
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
<div id="info_bread"><a href="index.php">首頁</a> > 最新消息</div><!--info_bread end-->
<div id="news">
<div id="news-left"><img src="images/news-icon.jpg" /></div>
<div id="news-right">
<table id="info_news_tabledetail" width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
<th colspan="3" ><?php echo $news_title;?></th>
</tr>
<tr style="padding-bottom:8px; font-size:12px;">
<td align="right" height="37" style=" text-align:right;">發佈日期： <?php echo $news_date; ?></td>
</tr>
<tr>
<td colspan="3" align="right" style="background-color:#FBF5EA; padding:	10px;"><div class="detail"><?php echo $news_intro; ?></div></td>
</tr>
</table>

<table id="info_news_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px;"><!--程式撰寫 顯示三到五筆-->
<?php include("includes/news_detail_list.php"); ?>
</table>
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