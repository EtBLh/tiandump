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
    </div>
    <!--header_menu end--> 
  </div>
  <!--header end-->
  
  <div id="info-con">
    <div id="info_bread"><a href="index.php">首頁</a> > 線上訂購</div>
    <!--info_bread end-->
    <div id="news">
      <div id="news-left"><img src="images/order-icon.jpg" /> <a class="topp" href="flow.php"><img src="images/products3-icon.jpg" /></a> </div>
      <div id="news-right">
        <table class="order" width="600" cellpadding="0" cellspacing="0" border="">
          <tr>
            <th colspan="5">第一步 選擇商品 >><span class="red2"> 第二步 填寫資料 >> 完成訂購</span></th>
          </tr>
      	  <?php include("includes/products_shopping_list.php"); ?>
        </table>
        <div class="form_title m_top20">結帳方式</div>
		<table class="check_menu_table" width="600" border="0" cellpadding="0" cellspacing="0">
		<td align="center">
		<label><input type="radio" name="check" class="cart_check" value="1" onclick="javascript:set_payway(this.value);"/> ATM轉帳</label>
		<label><input type="radio" name="check" class="cart_check" value="2" onclick="javascript:set_payway(this.value);" <?php echo ($_SESSION['usys']['payway'] == 2) ? 'checked' : ''; ?> />貨到付款</label></td>
		</table>
        <div class="co" style="margin: auto 200px;"><a href="includes/cart_commend.php?mode=gocheckout" target="pagetmp">下一步，繼續填寫收件資料</a></div>
      </div>
    </div>
    <!--news end--> 
  </div>
  <!--info-con end-->
  
  <div id="footer">
    <?php include("include/footer.php"); ?>
  </div>
  <!--footer end--> 
  
</div>
<!--wrapper end--> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> 
<script src="scripts/main.js"></script> 
<script src="scripts/all.js"></script>
</body>
</html>