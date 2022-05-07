<?php
require_once "fun/check.php";
require_once "../fun/database.inc.php";
include("orders.inc.php");

if ($mode == 'edit'){
	$dm1_sql = "select * from `".$tb."` where `".$key."`='".$id."'";
	require "../fun/dm1.php";
	require "../fun/getdata.php";
	
	$orderdate = date('Y/m/d',$orderdate);
	$byear = date('Y/m/d',$byear);
}elseif ($mode == 'add'){
	
	$orderdate = date('Y/m/d');
	$byear = date('Y/m/d');
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
<link media="screen" rel="stylesheet" href="fun/colorbox/css/colorbox.css" />
<script src="fun/colorbox/scripts/jquery.colorbox.js"></script>
<script>
	$(document).ready(function(){
		$(".ibon_link").colorbox({width:"50%", inline:true, href:"#ibon_box"});
	});
	$(function(){
		$('.date-pick').datepicker({maxDate:null,changeMonth: true,changeYear: true,dateFormat: "yy/mm/dd"});
	});
</script>
</head>
<body>

<div class="page_left_box"><!--page_left_box start-->
<div class="page_right_box"><!--page_right_box start-->
<div class="box_head"><!--box_head start-->
<div class="box_head_left"><img src="images/left-top-right.gif" width="17" height="29" /></div>
<div class="box_head_center"><img src="images/nofollow.gif" />當前位置：訂單資料 > <?php echo ($mode=='edit')? "修改" : "新增";?> </div>
<div class="box_head_right"><img src="images/nav-right-bg.gif" width="16" height="29" /></div>
</div><!--box_head end-->
<div class="box_body"><!--box_body start-->
<form name="form1" action="<?php echo $bgwin;?>.php" method="post" target="tmp" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
    <tr>
        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">購買商品</span></td>
    </tr>
    <tr>
        <td>
        <table width="100%" align="center" class="list_table">
			<tr class="gray">
    			<tr class="gray">
					<td width="4%">序號</td>
					<td width="36%">商品</td>
					<td width="10%">包裝</td>
					<td width="10%">價格</td>
					<td width="10%">數量</td>
					<td width="10%">小計</td>
				</tr>
          	</tr>
        	<?php
        	$dm1_sql = "select * from orders_data where ordersid='$id' order by productid asc";
			include("../fun/dm1.php");
			$sn = 1;
			for ($i=0; $i<$dm1_count; $i++) :
				$productid = dm1('productid', $i);
				$product_name = dm1('product_name', $i);
				$product_package = dm1('product_package', $i);
				$buy_price = dm1('buy_price', $i);
				$qty = dm1('qty', $i);
				$sums = dm1('sums', $i);

				echo "<tr>";
				echo "<td>$sn</td>";
				echo "<td>$product_name</td>";
				echo "<td>$product_package</td>";
				echo "<td>$buy_price</td>";
				echo "<td>$qty</td>";
				echo "<td>$sums</td>";
				echo "</tr>";
				$sn++;
			endfor;
        	?>
        	<tr>
				<td colspan="5" align="right">商品合計</td>
				<td align="left"><input name="product_total" value="<?=$product_total?>" style="width:60px;" /></td>
			</tr>
			<tr>
				<td colspan="5" align="right">手續費</td>
				<td align="left"><input name="cod_total" value="<?=$cod_total?>" style="width:60px;" /></td>
			</tr>
			<tr>
				<td colspan="5" align="right">運費</td>
				<td align="left"><input name="ship_total" value="<?=$ship_total?>" style="width:60px;" /></td>
			</tr>
			<tr>
				<td colspan="5" align="right">訂單金額</td>
				<td align="left"><input name="order_total" value="<?=$order_total?>" style="width:60px;" /></td>
			</tr>
		</table>
        </td>
    </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
    <tr>
        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">訂單信息</span></td>
    </tr>
    <tr>
        <td valign="top">
        	<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
        		<tr class="gray">
					<td align="right" width="12%">單據編號</td>
					<td><input name="ordersno" value="<?=$ordersno?>" /></td>
					<td align="right" width="12%">訂購日期</td>
					<td><input name="orderdate" value="<?=$orderdate?>" class="date-pick" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">訂購會員</td>
					<td>
					<?php
						echo "<select name=\"memberid\" id=\"memberid\">\n";
						echo "<option value=\"\">請選擇會員</option>\n";
						$dm1_sql = "select * from `member` where `lang`='".$_SESSION['asys']['lang']."'";
						include("../fun/dm1.php");
						for ($i=0; $i<$dm1_count; $i++){
							$f_memberid = dm1('memberid', $i);
							$f_name = dm1('name', $i);
							$f_logid = dm1('logid', $i);
							$ts1 = ($memberid == $f_memberid) ? ' selected' : '';
							echo "<option value=\"".$f_memberid."\"".$ts1.">".$f_name."=".$f_logid."</option>\n";
						}
						echo "</select>\n";
					?>
					</td>
					<td align="right" width="12%">信箱</td>
					<td><input name="member_email" value="<?=$member_email?>" /></td>
				</tr>
				<tr class="gray">
					<td align="right" width="12%">付款方式</td>
					<td>
					<input name="payway" type="radio" value="1" style="width:20px" <?php echo ($payway == '1') ? 'checked' : '';?> /> ATM轉帳
					<input name="payway" type="radio" value="2" style="width:20px" <?php echo ($payway == '2') ? 'checked' : '';?> /> 貨到付款
					</td>
					<td align="right" width="12%">預定收貨</td>
					<td><input name="liketime" value="<?=$liketime?>" /></td>
				</tr>
				<tr>
					<td align="right" width="12%">訂單狀態</td>
					<td colspan="3">
					<input name="orderflag" type="radio" value="0" style="width:20px" <?php echo ($orderflag == '0') ? 'checked' : '';?> /> 準備中
					<input name="orderflag" type="radio" value="1" style="width:20px" <?php echo ($orderflag == '1') ? 'checked' : '';?> /> 商品運送中
					<input name="orderflag" type="radio" value="2" style="width:20px" <?php echo ($orderflag == '2') ? 'checked' : '';?> /> 訂單完成
					<input name="orderflag" type="radio" value="3" style="width:20px" <?php echo ($orderflag == '3') ? 'checked' : '';?> /> 訂單取消
					</td>
				</tr>
        	</table>
    	</td>
    </tr>
</table>
<br/>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="49%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
	    <tr>
	        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">訂購人信息</span></td>
	    </tr>
	    <tr>
	        <td>
			<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
				<tr class="gray">
					<td align="right" width="20%">姓名</td>
					<td><input name="name" value="<?=$name?>" /></td>
				</tr>
				<tr>
					<td align="right" width="20%">性別</td>
					<td>
					<input name="sex" type="radio" value="0" style="width:20px" <?php echo ($sex == '0') ? 'checked' : '';?> /> 先生
					<input name="sex" type="radio" value="1" style="width:20px" <?php echo ($sex == '1') ? 'checked' : '';?> /> 小姐
					</td>
				</tr>
				<tr class="gray">
					<td align="right" width="20%">生日</td>
					<td><input name="byear" value="<?=$byear?>" class="date-pick" /></td>
				</tr>
				<tr>
					<td align="right" width="20%">手機號碼</td>
					<td><input name="phone" value="<?=$phone?>" /></td>
				</tr>
				<tr class="gray">
					<td align="right" width="20%">縣市</td>
					<td>
						<input name="address_city" value="<?=$address_city?>" style="width:146px;" />
						<input name="address_area" value="<?=$address_area?>" style="width:146px;" />
					</td>
				</tr>
				<tr>
					<td align="right" width="20%">聯絡地址</td>
					<td>
						<input name="address_zip" value="<?=$address_zip?>" style="width:40px;" />
						<input name="address" value="<?=$address?>" style="width:253px;" />
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
	</td>
	<td width="2%"></td>
	<td width="49%">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="line_table">
	    <tr>
	        <td background="images/news-title-bg.gif" class="left_bt2"><span class="left_bt">收件人信息</span></td>
	    </tr>
	    <tr>
	        <td>
			<table width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
				<tr class="gray">
					<td align="right" width="20%">姓名</td>
					<td><input name="r_name" value="<?=$r_name?>" /></td>
				</tr>
				<tr>
					<td align="right" width="20%">性別</td>
					<td>
					<input name="r_sex" type="radio" value="0" style="width:20px" <?php echo ($r_sex == '0') ? 'checked' : '';?> /> 先生
					<input name="r_sex" type="radio" value="1" style="width:20px" <?php echo ($r_sex == '1') ? 'checked' : '';?> /> 小姐
					</td>
				</tr>
				<tr class="gray">
					<td align="right" width="20%">手機號碼</td>
					<td><input name="r_phone" value="<?=$r_phone?>" /></td>
				</tr>
				<tr>
					<td align="right" width="20%">縣市</td>
					<td>
						<input name="r_address_city" value="<?=$r_address_city?>" style="width:146px;" />
						<input name="r_address_area" value="<?=$r_address_area?>" style="width:146px;" />
					</td>
				</tr>
				<tr class="gray">
					<td align="right" width="20%">聯絡地址</td>
					<td>
						<input name="r_address_zip" value="<?=$r_address_zip?>" style="width:40px;" />
						<input name="r_address" value="<?=$r_address?>" style="width:253px;" />
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
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