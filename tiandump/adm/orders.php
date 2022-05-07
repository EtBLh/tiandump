<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("orders.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>管理頁面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/system.js"></script>
<link rel="stylesheet" href="../fun/date/css/jquery.ui.all.css">
<script src="../fun/date/js/jquery-1.6.2.js"></script>
<script src="../fun/date/js/jquery.ui.core.js"></script>
<script src="../fun/date/js/jquery.ui.datepicker.js"></script>
<link media="screen" rel="stylesheet" href="fun/colorbox/css/colorbox.css" />
<script src="fun/colorbox/scripts/jquery.colorbox.js"></script>
<script>
	$(document).ready(function(){
		$(".search_link").colorbox({width:"50%", inline:true, href:"#search_box"});
	});
	$(function(){
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy/mm/dd"});
	});
</script>
</head>
<body>
<div style="display:none">
<div id="search_box">
<form name="searchform" action="<?=$mwin?>.php" method="post" target="_self">
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
<tr class="gray">
	<td width="25%" align="right">訂單編號</td><td><input name="ordersno" value="<?=$ordersno?>"/></td>
</tr>
<tr>
	<td width="25%" align="right">會員信箱</td><td><input name="member_email" value="<?=$member_email?>"/></td>
</tr>
<tr class="gray">
	<td width="25%" align="right">購買人</td><td><input name="name" value="<?=$name?>"/></td>
</tr>
<tr>
	<td width="25%" align="right">付款方式</td>
	<td>
	<input name="payway" type="radio" value="1" style="width:20px" <?php echo ($payway == '1') ? 'checked' : '';?> /> ATM轉帳
	<input name="payway" type="radio" value="2" style="width:20px" <?php echo ($payway == '2') ? 'checked' : '';?> /> 貨到付款
	</td>
</tr>
<tr class="gray">
	<td width="25%" align="right">訂購日期</td><td><input name="orderdate" value="<?=$orderdate?>" class="date-pick"/></td>
</tr>
<tr>
	<td width="25%" align="right">訂單狀態</td>
	<td>
	<input name="orderflag" type="radio" value="0" style="width:20px" <?php echo ($orderflag == '0') ? 'checked' : '';?> /> 準備中
	<input name="orderflag" type="radio" value="1" style="width:20px" <?php echo ($orderflag == '1') ? 'checked' : '';?> /> 商品運送中
	<input name="orderflag" type="radio" value="2" style="width:20px" <?php echo ($orderflag == '2') ? 'checked' : '';?> /> 訂單完成
	<input name="orderflag" type="radio" value="3" style="width:20px" <?php echo ($orderflag == '3') ? 'checked' : '';?> /> 訂單取消
	</td>
</tr>
<tr class="gray">
	<td colspan="2" align="center"><button type="submit"><img src="images/ok.gif" align="absmiddle"> 搜尋</button></td>
</tr>
</table>
<input name="search_flag" value="search_go" type="hidden" />
</form>
</div>
</div>


<div class="page_left_box"><!--page_left_box start-->
<div class="page_right_box"><!--page_right_box start-->
<div class="box_head"><!--box_head start-->
<div class="box_head_left"><img src="images/left-top-right.gif" width="17" height="29" /></div>
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：訂單資料 </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->
    
<div class="page_button_topdiv">
<div class="button_div">
<a href="javascript:del_click();"><img src="images/del.gif" align="absmiddle"> 刪除</a>
<a href="#" class="search_link"><img src="images/search.gif" align="absmiddle"> 搜尋</a>
</div>
<div class="page_div">
<?php
$where_sql = " where `lang`='".$_SESSION['asys']['lang']."'";
if (isset($search_flag) && $search_flag=="search_go" ) {
	if (isset($ordersno) && $ordersno !="" ) {
		$where_sql .= " and `ordersno`='$ordersno'";
	}
	if (isset($member_email) && $member_email !="" ) {
		$where_sql .= " and `member_email` like '%$member_email%'";
	}
	if (isset($name) && $name !="" ) {
		$where_sql .= " and `name` like '%$name%'";
	}
	if (isset($payway) && $payway !="" ) {
		$where_sql .= " and `payway`='$payway'";
	}
	if (isset($orderdate) && $orderdate !="" ) {
		$orderdate = strtotime($orderdate);
		$where_sql .= " and `orderdate`='$orderdate'";
	}
	if (isset($orderflag) && $orderflag !="" ) {
		$where_sql .= " and `orderflag`='$orderflag'";
	}
}

$countsql =  "select count(`".$key."`) as `t` from `".$tb."` $where_sql";
$pagerows = 10;

require "fun/page.php";
?>
</div>
</div>
<table width="100%" align="center" class="list_table">
	<tr class="gray">
		<td rowspan="2" width="2%"><input name="box1" id="box1" type="checkbox" onclick="checkall_click()" style="width:20px;"></td>
		<td rowspan="2" width="10%">單據編號</td>
		<td rowspan="2" width="10%">信箱</td>
		<td colspan="2" width="20%"><div align="center">收件人信息</div></td>
		<td rowspan="2">付款方式</td>
		<td rowspan="2">商品合計</td>
		<td rowspan="2">手續費</td>
		<td rowspan="2">運費</td>
		<td rowspan="2">訂單金額</td>
		<td rowspan="2" width="9%">希望時間</td>
		<td rowspan="2" width="6%">訂購日期</td>
		<td rowspan="2" width="6%">訂單狀態</td>
	</tr>
	<tr class="gray">
		<td width="5%">姓名</td>
		<td width="15%">手機號碼</td>
	</tr>
<?php
$dm1_sql = "select * from `".$tb."` $where_sql order by `".$key."` asc limit $currow,$pagerows";
require "../fun/dm1.php";

for ($i=0; $i<$dm1_count; $i++){
	$id = dm1($key, $i);
	$idx = $i;
	require "../fun/getdata.php";

	if($payway == 1){
		$payway = "ATM轉帳";
	}elseif($payway == 2){
		$payway = "貨到付款";
	}else{
		$payway = "";
	}
	$orderdate = date('Y/m/d',$orderdate);
	if($orderflag == 0){
		$orderflag = "準備中";
	}elseif($orderflag == 1){
		$orderflag = "商品運送中";
	}elseif($orderflag == 2){
		$orderflag = "訂單完成";
	}elseif($orderflag == 3){
		$orderflag = "訂單取消";
	}


	echo "<tr>";
		echo "<td><input name=\"c_box\" value=\"$id\" type=\"checkbox\" style=\"width:20px;\" tabIndex=\"-1\" /></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$ordersno</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$member_email</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$r_name</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$r_phone</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$payway</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$product_total</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$cod_total</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$ship_total</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$order_total</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$liketime</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$orderdate</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$orderflag</a></td>\n";
	echo "</tr>";
}
?>
</table>
<div class="page_button_buttomdiv">
<div class="button_div">
<a href="javascript:del_click();"><img src="images/del.gif" align="absmiddle"> 刪除</a>
<a href="#" class="search_link"><img src="images/search.gif" align="absmiddle"> 搜尋</a>
</div>
<div class="page_div"><?php require "fun/page.php";?></div>
</div>

</div><!--box_body end-->
<div class="box_footer"><!--box_footer start-->
<div class="box_footer_left"><img src="images/buttom_left2.gif" width="17" height="17" /></div>
<div class="box_footer_center"></div>
<div class="box_footer_right"><img src="images/buttom_right2.gif" width="16" height="17" /></div>
</div><!--box_footer end-->
</div><!--page_right_box end-->
</div><!--page_left_box end-->

<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp">
<input name="ids" id="ids" type="hidden" />
<input name="vals" id="vals" type="hidden" />
<input name="mode" id="mode" type="hidden" value="del" />
</form>

<script language="javascript">
function add_click(){
	window.location.href='<?php echo $addwin;?>.php?mode=add';
}
function edit_click(x){
	window.location.href='<?php echo $addwin;?>.php?mode=edit&id='+x;
}
function del_click(){
	var i,ts1='';
	for (i=0; i<document.getElementsByName("c_box").length; i++){
		if (document.getElementsByName("c_box")[i].type != 'checkbox'){continue};
		if (document.getElementsByName("c_box")[i].name == 'box1'){continue};
		if (document.getElementsByName("c_box")[i].checked){
			if (ts1 != ''){ts1 += ','};
			ts1 += document.getElementsByName("c_box")[i].value;
		};
	};
	if (ts1 == ''){
		alert('沒有選擇資料');
		return;
	}else{
		if (! confirm('確定要刪除這些資料嗎 ?')){return};
	};
	document.getElementById("ids").value = ts1;
	document.getElementById("mode").value = 'del';
	document.form1.submit();
}
</script>
<iframe name="tmp" style="display:none"></iframe>
</body>
</html>