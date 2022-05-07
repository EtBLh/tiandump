<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("products.inc.php");

if ($mode == 'edit'){
	$dm1_sql = "select * from `".$tb."` where `".$key."`='".$id."'";
	require "../fun/dm1.php";
	require "../fun/getdata.php";
	

}elseif ($mode == 'add'){
	

}
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
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：產品上架 > <?php echo ($mode=='edit')? "修改" : "新增";?> </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
	<tr class="gray">
		<td align="right" width="12%">圖(300px×200px)</td>
		<td>
		<input name="productt_pic" type="file" />
		<?php
			if ($productt_pic != '' && file_exists("../upload/products/productt_pic/$productt_pic")){
				echo "<div class=\"photos_css2\"><a href=\"../upload/products/productt_pic/$productt_pic\" target=\"_blank\"><img src=\"../upload/products/productt_pic/$productt_pic\" /></a></div>";
				echo "<a href=\"fun/delfile.php?tb=products&field=productt_pic&filename=$productt_pic&keyname=$key&id=$id\" target=\"tmp\">刪除此檔案</a>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td align="right" width="12%">名稱</td>
		<td><input name="product_name" value="<?=$product_name?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">包裝規格</td>
		<td><input name="product_unit" value="<?=$product_unit?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">原價</td>
		<td><input name="product_price" value="<?=$product_price?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">特價</td>
		<td><input name="product_price2" value="<?=$product_price2?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">特色說明</td>
		<td>
		<?php
		$ename = 'product_intro1';
		$evalue = $product_intro1;
		require "fun/editor.php";
		?>
		</td>
	</tr>

	</table>


<div class="detail_button">
<button type="submit"><img src="images/ok.gif" align="absmiddle"> 存檔</button>
<button type="button" onclick="window.location.href='<?php echo $mwin;?>.php'"><img src="images/back.gif" align="absmiddle"> 返回</button>
</div>

<input name="id" type="hidden" value="<?php echo $id;?>" />
<input name="mode" type="hidden" value="<?php echo $mode;?>" />
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