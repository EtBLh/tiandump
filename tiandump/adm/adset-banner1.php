<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("adset-banner.inc.php");

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
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：首頁廣告 > <?php echo ($mode=='edit')? "修改" : "新增";?> </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
	<tr class="gray">
		<td align="right" width="12%">圖</td>
		<td>
		<input name="ad_pic" type="file" />
		<?php
			if ($ad_pic != '' && file_exists("../upload/adset_banner/ad_pic/$ad_pic")){
				echo "<div class=\"photos_css2\"><a href=\"../upload/adset_banner/ad_pic/$ad_pic\" target=\"_blank\"><img src=\"../upload/adset_banner/ad_pic/$ad_pic\" /></a></div>";
				echo "<a href=\"fun/delfile.php?tb=adset_banner&field=ad_pic&filename=$ad_pic&keyname=$key&id=$id\" target=\"tmp\">刪除此檔案</a>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td align="right" width="12%">連結網址</td>
		<td><input name="ad_url" value="<?=$ad_url?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">連結方式</td>
		<td>
		<input name="ad_url_type" type="radio" value="0" style="width:20px" <?php echo ($ad_url_type == '0') ? 'checked' : '';?> /> 原窗体
		<input name="ad_url_type" type="radio" value="1" style="width:20px" <?php echo ($ad_url_type == '1') ? 'checked' : '';?> /> 新窗体
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