<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("member.inc.php");

if ($mode == 'edit'){
	$dm1_sql = "select * from `".$tb."` where `".$key."`='".$id."'";
	require "../fun/dm1.php";
	require "../fun/getdata.php";
	
	$addingdate = date('Y/m/d',$addingdate);
	$byear = date('Y/m/d',$byear);
}elseif ($mode == 'add'){
	$byear = date('Y/m/d');
	$addingdate = date('Y/m/d');

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
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：會員資料 > <?php echo ($mode=='edit')? "修改" : "新增";?> </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
	<tr class="gray">
		<td align="right" width="12%">賬號</td>
		<td><input name="logid" value="<?=$logid?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">密碼</td>
		<td><input name="password" value="<?=$password?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">真實姓名</td>
		<td>
			<input name="name" value="<?=$name?>" />
			<input name="sex" type="radio" value="0" style="width:20px" checked /> 先生
			<input name="sex" type="radio" value="1" style="width:20px" <?php echo ($isopen == '1') ? 'checked' : '';?> /> 小姐
		</td>
	</tr>
	<tr>
		<td align="right" width="12%">生日</td>
		<td><input name="byear" value="<?=$byear?>" class="date-pick" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">聯絡電話</td>
		<td><input name="tel" value="<?=$tel?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">行動電話</td>
		<td><input name="cellphone" value="<?=$cellphone?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">Email</td>
		<td><input name="member_email" value="<?=$member_email?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">縣市</td>
		<td><input name="address_city" value="<?=$address_city?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">區域</td>
		<td><input name="address_area" value="<?=$address_area?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">郵編</td>
		<td><input name="address_zip" value="<?=$address_zip?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">聯絡地址</td>
		<td><input name="address" value="<?=$address?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">加入日期</td>
		<td><input name="addingdate" value="<?=$addingdate?>" class="date-pick" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">會員狀態</td>
		<td>
		<input name="isopen" type="radio" value="0" style="width:20px" checked /> 正常
		<input name="isopen" type="radio" value="1" style="width:20px" <?php echo ($isopen == '1') ? 'checked' : '';?> /> 黑名單
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