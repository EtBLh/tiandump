<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";

$dm1_sql = "select * from `sys_smtp` where `lang`='".$_SESSION['asys']['lang']."'";
require "../fun/dm1.php";
require "../fun/getdata.php";

if ($dm1_count == 0){
	$exec = "insert into `sys_smtp` (`smtp_hosting`,`smtp_port`,`smtp_check`,`lang`) values ('localhost','25','0','".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$dm1_sql = "select * from `sys_smtp` where `lang`='".$_SESSION['asys']['lang']."'";
	require "../fun/dm1.php";
	require "../fun/getdata.php";
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
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：信箱設置 </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->

<form name="form1" action="sys_smtp0.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
    <tr>
        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">信箱設置</span></td>
    </tr>
    <tr>
        <td>
		    <table width="100%" border="0" cellpadding="4" cellspacing="0">
				<tr class="gray">
					<td align="right" width="12%">發件人名稱</td>
					<td><input name="send_name" value="<?php echo $send_name;?>" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">發件人信箱</td>
					<td><input name="send_email" value="<?php echo $send_email;?>" /></td>
				</tr>
				<tr class="gray">
					<td align="right" width="12%">收件人名稱</td>
					<td><input name="receive_name" value="<?php echo $receive_name;?>" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">收件人信箱</td>
					<td><input name="receive_email" value="<?php echo $receive_email;?>" />(多個信箱請用;隔開)</td>
				</tr>
			</table>
    	</td>
    </tr>
</table>
<br>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
    <tr>
        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">SMTP主機設置</span></td>
    </tr>
    <tr>
        <td>
    		<table width="100%" border="0" cellpadding="4" cellspacing="0">
				<tr class="gray">
					<td align="right" width="12%">SMTP主機</td>
					<td><input name="smtp_hosting" value="<?php echo $smtp_hosting;?>" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">SMTPPort</td>
					<td><input name="smtp_port" value="<?php echo $smtp_port;?>" /></td>
				</tr>
				<tr class="gray">
					<td align="right" width="12%">SMTP是否須驗證</td>
					<td>
					<input name="smtp_check" type="radio" value="0" style="width:20px" <?php echo ($smtp_check == '0') ? 'checked' : '';?> /> 否
					<input name="smtp_check" type="radio" value="1" style="width:20px" <?php echo ($smtp_check == '1') ? 'checked' : '';?> /> 是
					</td>
				</tr>
				<tr>
					<td align="right" width="12%">SMTP帳號</td>
					<td><input name="smtp_user" value="<?php echo $smtp_user;?>" /></td>
				</tr>
				<tr class="gray">
					<td align="right" width="12%">SMTP密碼</td>
					<td><input name="smtp_password" value="<?php echo $smtp_password;?>" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">SMTP安全連線(ex:ssl)</td>
					<td><input name="smtp_secure" value="<?php echo $smtp_secure;?>" /></td>
				</tr>
			</table>
    	</td>
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