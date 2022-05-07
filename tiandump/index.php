<?php
	session_start();
	require_once "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ZH" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-tw">
<head>
<meta name="facebook-domain-verification" content="0ukzd9x771njfyxfk88rqv82bgf8fa" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="水餃,水餃店,高麗菜水餃,蔥燒水餃餃,玉米水餃,韭菜水餃,台南市,新化,桃園市,龍潭區,天字號"/>
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
<!-- <?php include("include/menu.php"); ?> -->
</div><!--header_menu end-->
</div><!--header end-->

<div id="banner">
	<ul>
	<?php include("includes/index_adset_banner.php"); ?>
  </ul>
</div><!--banner end-->

<div id="idx-product">
	<?php include("includes/index_products.php"); ?>
</div><!--idx-product end-->


<div id="idx-infor">
<div class="idx-infor-box">
<div class="idx-infor-title"><a href="products.php">產品一覽</a></div>
<div class="idx-infor-img"><a href="products.php"><img src="images/idx-infor-1.jpg" /></a></div>
<div class="idx-infor-text">嚴選優質新鮮食材，師父手工製作，保留傳統的好味道。</div>
<div class="idx-products-more"><a href="products.php">閱讀</a></div>
</div><!--idx-infor-box end-->

<div class="idx-infor-box">
<div class="idx-infor-title"><a href="flow.php">購物說明</a></div>
<div class="idx-infor-img"><a href="flow.php"><img src="images/idx-infor-2.jpg" /></a></div>
<div class="idx-infor-text">詳細的購物說明，讓您買得更安心與快速。</div>
<div class="idx-products-more"><a href="flow.php">閱讀</a></div>
</div><!--idx-infor-box end-->

<div class="idx-infor-box">
<div class="idx-infor-title"><a href="news-detail.php">最新消息</a></div>
<div class="idx-infor-img"><a href="news-detail.php"><img src="images/idx-infor-3.jpg" /></a></div>
<div class="idx-infor-text">天字號最新活動廣告資訊。</div>
<div class="idx-products-more"><a href="news-detail.php">閱讀</a></div>
</div><!--idx-infor-box end-->

<div class="idx-infor-box">
<div class="idx-infor-title"><a href="about.php">關於我們</a></div>
<div class="idx-infor-img"><a href="about.php"><img src="images/idx-infor-4.jpg" /></a></div>
<div class="idx-infor-text">三十年的老店，豐富經驗累積出傳統的好滋味。</div>
<div class="idx-products-more"><a href="about.php">閱讀</a></div>
</div><!--idx-infor-box end-->

</div><!--idx-infor end-->

<div id="footer">
<?php include("include/footer.php"); ?>
</div><!--footer end-->

</div><!--wrapper end-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="scripts/jquery.corner.js"></script>
<script src="scripts/all.js"></script>


</body>
</html>