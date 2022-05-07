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
<div id="info_bread"><a href="index.php">首頁</a> > 關於我們</div><!--info_bread end-->
<div id="about-top">
<div class="about-top_left"><img src="images/about-1.jpg" /></div>
<div class="about-top_right"><img src="images/about-2.jpg" /></div>
<div class="about-top_text">
  <div data-jsid="message">
    <h1 style="color:#000; font-size:16px; margin-bottom:15px;">堅持使用傳統的好味道,滿足每一個味蕾的享受</h1>
    <p>天字號每天到市場挑選現宰豬後腿肉,嚴選鮮甜的高麗菜,手工桿製每一片Q彈的水餃皮, 細心包製每一顆水餃,層層的用心,都是希望滿足每一個不同的味蕾,餐餐都能幸福好食光。  </p>
  </div>
  <p>&nbsp;</p>
</div>
</div><!--about-top end-->

<div id="about-middle">
<div class="about-middle_left"><img src="images/about-6.jpg" />
<div class="about-middle_text">
  <h1 style="color:#000; font-size:16px; margin-bottom:15px;">食材絕對新鮮、口感清甜實在</h1>
  <p>天字號堅持使用CAS電宰豬肉,新鮮又安心。</p>
  <p>&nbsp;</p>
	<p>水餃生產完成,即進入溫度攝氏零下20~30度的冷凍設備, 將產品新鮮完整的保留,每一口都吃得到新鮮美味。</p>
  <p>&nbsp;</p>
  <p>水餃生產過程中絕不含任何人工味素及防腐劑,為您的健康把關。</p>
  <p>&nbsp;</p>
  <p>運送過程,有冷凍空調設備的宅配公司配合,全程低溫保鮮配送, 產品在運送中維持最原本的品質。</p>
  <p>&nbsp;</p>
</div>
</div>
<div class="about-middle_right"><img src="images/about-3.jpg" /></div>
</div><!--about-middle end-->

<div id="about-bottom">
<div class="about-bottom_title"><img src="images/about-4.jpg" /></div>
<div class="about-bottom_bottom"><img src="images/about-5.jpg" /></div>
</div><!--about-bottom end-->
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