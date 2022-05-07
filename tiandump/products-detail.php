<?php
	require_once "includes/config.php";
	require_once "includes/products_detail_data.php"
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
<div id="info_bread"><a href="index.php">首頁</a> > 產品一覽</div><!--info_bread end-->
<div id="news">
<div id="news-left"><img src="images/products-icon.jpg" />
  <a class="topp" href="flow.php"><img src="images/products3-icon.jpg" /></a>
</div>
<div id="news-right">
<div class="products-title_box">
<div class="products-in_title"><?php echo $product_name; ?></div>
</div>

<div class="in_products_box" style="padding-bottom:20px;">
<div id="products-pic" class="m_bottom20">
<div id="products"><img src="upload/products/productt_pic/<?php echo $productt_pic; ?>" width="300"></div>
</div>
<div id="products-detail_info">
<table width="280" cellpadding="0" cellspacing="0" border="0">
<tr><td>
<h1><?php echo $product_name; ?></h1>
<p>包裝規格：<?php echo $product_unit; ?></p>
<p>原價：<?php echo $product_price; ?>元</p>
<p>特價：<span class="red"><?php echo $product_price2; ?>元</span></p>
</td></tr>
<tr><td><div class="co" style="margin:20px 0 0 0;"><a href="order.php">我要訂購商品</a></div></td></tr>
</table>
</div>
</div><!--in_products_box end-->

<div class="products-title_box2">
<div class="products-in_title">特色說明</div>
</div>
<div class="products-detail_box"><!--網頁編輯器-->
<?php echo $product_intro1; ?>
</div><!--products-detail_box-->
         
</div><!--news-right end-->
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