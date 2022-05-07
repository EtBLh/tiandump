<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";

$dm1_sql = "select * from `orders_set` where lang='".$_SESSION['asys']['lang']."'";
require '../fun/dm1.php';
require '../fun/getdata.php';

if ($dm1_count == 0) :
	$exec = "insert into `orders_set` (`lang`) values ('".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$dm1_sql = "select * from `orders_set` where `lang`='".$_SESSION['asys']['lang']."'";
	require "../fun/dm1.php";
	require "../fun/getdata.php";
endif;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>管理頁面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../fun/date/css/jquery.ui.all.css">
<script src="../fun/date/js/jquery-1.6.2.js"></script>
<script src="../fun/date/js/jquery.ui.core.js"></script>
<script src="../fun/date/js/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy/mm/dd"});
	});
	function db_pdbd_date(){
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy/mm/dd"});
	}
</script>
</head>
<body>

<div class="page_left_box"><!--page_left_box start-->
<div class="page_right_box"><!--page_right_box start-->
<div class="box_head"><!--box_head start-->
<div class="box_head_left"><img src="images/left-top-right.gif" width="17" height="29" /></div>
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：購物設置 </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="orders-set0.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
	<tr class="gray">
		<td align="right" width="12%">運費金額</td>
		<td><input name="ship_total" value="<?=$ship_total?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">免運費門檻</td>
		<td><input name="ship_line_total" value="<?=$ship_line_total?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">貨到付款手續費</td>
		<td><input name="cod_total" value="<?=$cod_total?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">免手續費門檻</td>
		<td><input name="cod_line_total" value="<?=$cod_line_total?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">匯款銀行</td>
		<td><input name="bank_name" value="<?=$bank_name?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">銀行代號</td>
		<td><input name="bank_no" value="<?=$bank_no?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">帳戶戶名</td>
		<td><input name="card_name" value="<?=$card_name?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">匯款帳號</td>
		<td><input name="card_no" value="<?=$card_no?>" /></td>
	</tr>
</table>


<div class="detail_button">
<button type="submit"><img src="images/ok.gif" align="absmiddle"> 存檔</button>
</div>
</form>

</div><!--box_body end-->
<div class="box_footer"><!--box_footer start-->
<div class="box_footer_left"><img src="images/buttom_left2.gif" width="17" height="17" /></div>
<div class="box_footer_center"></div>
<div class="box_footer_right"><img src="images/buttom_right2.gif" width="16" height="17" /></div>
</div><!--box_footer end-->
</div><!--page_right_box end-->
</div><!--page_left_box end-->
<iframe name="tmp" style="display:none"></iframe>
</body>
</html>