<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("sys_manager.inc.php");

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
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd"});
	});
	function db_pdbd_date(){
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd"});
	}
</script>
</head>
<body>

<div class="page_left_box"><!--page_left_box start-->
<div class="page_right_box"><!--page_right_box start-->
<div class="box_head"><!--box_head start-->
<div class="box_head_left"><img src="images/left-top-right.gif" width="17" height="29" /></div>
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：管理者 > <?php echo ($mode=='edit')? "修改" : "新增";?> </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
	<tr class="gray">
		<td align="right" width="12%">帳號</td>
		<td><input name="logid" value="<?=$logid?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">密碼</td>
		<td><input name="pwd" value="<?=$pwd?>" /></td>
	</tr>
	<tr class="gray">
		<td align="right" width="12%">姓名</td>
		<td><input name="title" value="<?=$title?>" /></td>
	</tr>
	<tr>
		<td align="right" width="12%">最后一次登入</td>
		<td><?=$login_date?></td>
	</tr>

	</table>


<hr size="1" color="silver">

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
   	<tr>
    	<td background="images/news-title-bg.gif" class="left_bt2" colspan="2"><span class="left_bt">使用權限</span></td>
	</tr>
<?php
$ismenu = 1;
include('menuset.inc.php');
$ti1 = count($mset);
for ($i=0; $i<$ti1; $i++){
	$ts1 = $mset[$i][0];
	$class_gray = ($i % 2 == 0) ? " class=\"gray\"" : "";
	
	echo "<tr".$class_gray."><td align=\"right\" width=\"12%\">$ts1</td>";
	echo "<td>";
	$ti2 = count($mset[$i]);
	for ($j=1; $j<$ti2; $j++){
		$ta2 = explode('	', $mset[$i][$j]);
		if ($ta2[1] == 0) continue;
		$dm1_sql = "select `mid` from `sys_rights` where `mid`='".$id."' and `fun1`='".$i."' and `fun2`='".$j."'";
		require "../fun/dm1.php";

		$ts3 = ($dm1_count > 0) ? ' checked' : '';
		echo "<input name=\"c_".$i."_".$j."\" type=\"checkbox\" style=\"width:20px;\" $ts3> $ta2[0]<br>";
	}
	echo "</td></tr>";
}
?>
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