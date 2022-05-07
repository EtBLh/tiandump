<?php
	session_start();
	require_once "includes/config.php";
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
<table id="info_news_table" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr style="text-align:center; font-size:15px; color:#9B1210; font-weight:bold; border-bottom:#CCC 2px solid;">
<td width="8%" height="25" >NO</td>
<td width="73%">標&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 題</td>
<td width="19%">發佈日期</td>
</tr>
<?php include("includes/news_list.php"); ?>
</table>

<div id="info_news_page_num" style="text-align: center;" >
	<script type="text/javascript" src="fun/page.js"></script>
	<?php 
		if($totalpages > 0 && $curpage > 0) echo "<a href=\"javascript:upage(".$curpage.",".$totalpages.");\">上一頁</a>\n";
		$pagemode = 1;
		require "fun/page.php";
		if($totalpages > 0 && $curpage+1 < $totalpages) echo "<a href=\"javascript:dpage(".$curpage.",".$totalpages.");\">下一頁</a>\n";
	?>
</div><!--info_news_page_num-->
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