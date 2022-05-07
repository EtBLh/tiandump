<?php
	session_start();
	require_once "includes/cart_unlogin_check.php";
	require_once "includes/config.php";
	require_once "includes/member_data.php";
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
		AddressInit("address_city","address_area","address_zip","<?php echo $address_city ?>","<?php echo $address_area ?>") ;
		AddressInit("r_address_city","r_address_area","r_address_zip","","") ;
		
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd"});
	}) ;
	</script>
<script src="scripts/CartCheck.js"></script>
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
<div id="info_bread"><a href="index.php">首頁</a> > <a href="order.php">線上訂購</a> > 填寫資料</div><!--info_bread end-->
<div id="news">
<div id="news-left"><img src="images/order-icon.jpg" />
  <a class="topp" href="#"><img src="images/products3-icon.jpg" /></a>
</div>
<div id="news-right">

<table class="order" width="600" cellpadding="0" cellspacing="0" border="">
<tr>
<th colspan="5"><span class="red2">第一步 選擇商品 >> </span>第二步 填寫資料 >> <span class="red2">完成訂購</span></th></tr>
<tr>
</table><!---------------->

<table class="cart_table" width="600" cellpadding="0" cellspacing="0" border="">
<tr>
<th colspan="2" align="center">商 品</th>
<th width="15%" align="left">包裝類型</th>
<th width="10%" align="center">價 格</th>
<th width="20%" align="center">數 量</th>
</tr>
<?php include("includes/cart_list.php"); ?>
</table>
     
<table class="cart_price_table" width="600" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="65%" align="right" class="p_top10 p_right25">商品合計</td>
<td width="17%" align="center" class="red p_top10"><?php echo $product_total; ?></td>
<td width="18%"></td>
</tr>
<tr>
<td width="65%" align="right" class="p_right25">運 費</td>
<td width="17%" align="center"><?php echo ($ship_total == 0) ? '滿'.$set_ship_line_total.'免運費' : $ship_total; ?></td>
<td width="18%"></td>
</tr>
<?php if($_SESSION['usys']['payway'] == 2 ){ ?>
<tr>
<td width="65%" align="right" class="p_right25">貨到付款手續費</td>
<td width="17%" align="center"><?php echo ($cod_total == 0) ? '滿'.$set_cod_line_total.'免手續費' : $cod_total; ?></td>
<td width="18%"></td>
</tr>
<?php } ?>
<tr>
<td width="65%" align="right" class="p_bottom15 p_top10 p_right25">總金額</td>
<td width="17%" align="center" class="p_bottom15 p_top10"><span class="price">NT <?php echo $sub_total; ?></span></td>
<td width="18%"></td>
</tr>
</table>
    
<div class="form_title">購買人資訊</div>
<form name="go_check_form" action="includes/cart_send.php" method="post" target="pagetmp">
<table class="form_table" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<th width="30%">* Email：</th>
<td width="70%"><input class="mail" id="member_email" size="15" name="member_email"  value="<?php echo $member_email; ?>"/></td>
</tr>
<tr>
<th width="30%">* 購買人：</th>
<td width="70%">
<input class="name" id="name" size="15" name="name" type="text" value="<?php echo $name; ?>" />
<select class="select sex" name="sex" id="sex">
<option value=""> -- 請選擇性別 -- </option>
<option value="0"<?php echo $sex==0 ? ' selected' : ''; ?>>先生</option>
<option value="1"<?php echo $sex==1 ? ' selected' : ''; ?>>小姐</option>
</select>
</td>
</tr>
<tr>
<th width="30%">* 手機號碼：</th>
<td width="70%"><input class="mail" id="phone" size="15" name="phone" value="<?php echo $tel; ?>" type="text" /></td>
</tr>
<tr>
<th width="30%">* 生 日：</th>
<td width="70%"><input class="mail date-pick" id="byear" size="15" name="byear" value="<?php echo ($byear > 0) ? date('Y-m-d',$byear) : ''; ?>" type="text" /></td>
</tr>
<tr>
<th width="30%">* 城 市：</th>
<td width="70%">
<select name="address_city" id="address_city" class="form_select zip"></select>
<select name="address_area" id="address_area" class="form_select zip"></select>
</td>
</tr>
<tr><th width="30%">地 址：</th>
<td width="70%">
<input class="name" id="address_zip"  name="address_zip" value="<?php echo $address_zip; ?>" style="width:40px; margin-right:5px;"/>
<input class="address" name="address" id="address" value="<?php echo $address; ?>" type="text" />
</td>
</tr>
</table>
      
<div class="form_title m_top20">收件人資訊</div>
<table class="form_table" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<th width="30%"><input type="checkbox"  name="same" id="same"  onclick="javascript:sameinfo();" /></th>
<td width="70%">收件人同上</td>
</tr>
<tr>
<th width="30%">* 收件人：</th>
<td width="70%">
<input class="name" id="r_name" size="15" name="r_name" type="text" />
<select class="select sex" name="r_sex" id="r_sex">
<option value=""> -- 請選擇性別 -- </option>
<option value="0">先生</option>
<option value="1">小姐</option>
</select>
</td>
</tr>
<tr>
<th width="30%">* 手機號碼：</th>
<td width="70%"><input class="mail" id="r_phone" size="15" name="r_phone" type="text" /></td>
</tr>
<tr>
<th width="30%">* 城 市：</th>
<td width="70%">
<select name="r_address_city" id="r_address_city" class="form_select zip"></select>
<select name="r_address_area" id="r_address_area" class="form_select zip" ></select>
</td>
</tr>
<tr><th width="30%">* 地 址：</th>
<td width="70%">
<input class="name" id="r_address_zip"  name="r_address_zip" style="width:40px; margin-right:5px;"/>
<input class="address" type="text"  id="r_address"  name="r_address" />
</td>
</tr>
</table>

<div class="form_title m_top20">其他資訊</div>
<table class="form_table" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<th width="35%">希望收貨時間：</th>
<td width="65%"><input class="mail" id="textfield2" size="15" name="liketime" type="text" /></td>
</tr>
<tr>
<th width="35%">備註：</th>
<td width="65%"><textarea class="comment" cols="40" rows="5" name="note"></textarea></td>
</tr>
</table> 
<!--
<div class="form_title m_top20">結帳方式</div>
<table class="check_menu_table" width="600" border="0" cellpadding="0" cellspacing="0">
<td align="center">
<label><input type="radio" name="check" class="cart_check" value="0"/> ATM轉帳</label>
<label><input type="radio" name="check" class="cart_check" value="2" />貨到付款</label></td>
</table>-->
            
<div class="co" style="margin: auto 260px;display:block;"  id="button_div"><a href="javascript:go_check('<?php echo count($_SESSION['usys']['cart']); ?>','<?php echo $_SESSION['usys']['payway']; ?>');">送出訂單</a></div>
<div id= "submit_div" style="display:none">正在提交訂單。。。請不要關閉或切換當前頁面，直到頁面自動跳轉！</div>
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