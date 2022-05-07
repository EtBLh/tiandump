<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("orders-payatm-note.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>管理頁面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/system.js"></script>

</head>
<body>

<div class="page_left_box"><!--page_left_box start-->
<div class="page_right_box"><!--page_right_box start-->
<div class="box_head"><!--box_head start-->
<div class="box_head_left"><img src="images/left-top-right.gif" width="17" height="29" /></div>
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：匯款通知 </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->
	
<div class="page_button_topdiv">
<div class="button_div">
<a href="javascript:del_click();"><img src="images/del.gif" align="absmiddle"> 刪除</a>

<a href="javascript:add_click();"><img src="images/add.gif" align="absmiddle"> 新增</a>

</div>
<div class="page_div">
<?php
$where_sql = " where `lang`='".$_SESSION['asys']['lang']."'";

$countsql =  "select count(`".$key."`) as `t` from `".$tb."` ".$where_sql;
$pagerows = 10;

require "fun/page.php";
?>
</div>
</div>
<table width="100%" align="center" class="list_table">
	<tr class="gray">
		<td width="2%" align="center"><input type="checkbox" name="box1" id="box1" onclick="checkall_click()" style="width:20px;"></td>
		<td>訂單號碼</td>
		<td>會員姓名</td>
		<td>訂購日期</td>
		<td>訂單金額</td>
		<td>匯出銀行代碼</td>
		<td>匯出銀行後五碼</td>
		<td>聯絡電話</td>
		<td>提交日期</td>
	</tr>
<?php
$dm1_sql = "select * from `".$tb."` ".$where_sql." order by `".$key."` desc limit ".$currow.",".$pagerows;
require "../fun/dm1.php";

for ($i=0; $i<$dm1_count; $i++){
	$id = dm1($key, $i);
	$idx = $i;
	require "../fun/getdata.php";

	$orderdate = date('Y/m/d',$orderdate);
	$order_note_date = date('Y/m/d',$order_note_date);


	echo "<tr>\n";
		echo "<td><input name=\"c_box\" value=\"$id\" type=\"checkbox\" style=\"width:20px;\" tabIndex=\"-1\" /></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$ordersno</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$name</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$orderdate</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$order_total</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$bank_no</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$bank_order_no</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$phone</a></td>\n";
		echo "<td><a href=\"javascript:edit_click($id)\" target=\"_self\">$order_note_date</a></td>\n";
	echo "</tr>\n";
}
?>
</table>
<div class="page_button_buttomdiv">
<div class="button_div">
<a href="javascript:del_click();"><img src="images/del.gif" align="absmiddle"> 刪除</a>

<a href="javascript:add_click();"><img src="images/add.gif" align="absmiddle"> 新增</a>

</div>
<div class="page_div"><?php require "fun/page.php"; ?></div>
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