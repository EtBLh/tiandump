<?php
$dm1_sql = "select * from `products` where `lang`='1' order by `seq` asc,`productid` asc";
require "fun/dm1.php";
for ($i=0; $i<$dm1_count; $i++){
	$productid = dm1("productid",$i);
	$productt_pic = dm1("productt_pic",$i);
	$product_name = dm1("product_name",$i);
	$product_price2 = dm1("product_price2",$i);
	
	
	$cart_count = count($_SESSION['usys']['cart']);
	for ($j=0; $j<$cart_count; $j++){
		if($_SESSION['usys']['cart'][$j][0] == $productid){//表示產品已經在購物車中
			$cur_qty = $_SESSION['usys']['cart'][$j][1];//記錄數量用於顯示
			$cur_package = $_SESSION['usys']['cart'][$j][2];//記錄包裝用於顯示
			break;
		}
	}
	echo '
		<tr>
          	<td width="23%" align="center">
            	<a class="overlay" href="products-detail.php?pd='.$productid.'">
              <img src="upload/products/productt_pic/'.$productt_pic.'" />
              </a>
            </td>
            <td width="25%" align="center">
            	<h2>'.$product_name.'</h2>
            </td>
            <td width="19%" align="center"><p>特價：<span class="price">'.$product_price2.'</span></p></td>
            <td width="21%" align="center"><select name="package_'.$productid.'" id="package_'.$productid.'" class="count" onchange="javascript:set_package('.$productid.',this.value);">
                <option value="" selected="selected">選擇包裝</option>
	';
				$dm2_sql = "select * from `products_package` where `lang`='1'";
				require "fun/dm2.php";
				for($i2=0;$i2<$dm2_count;$i2++){
					$package_title = dm2('package_title',$i2);
					$selected_str = ($cur_package == $package_title) ? ' selected' : '';
					echo '<option value="'.$package_title.'"'.$selected_str.'>'.$package_title.'</option>'."\n";
				}

	echo '
              </select></td>
            <td width="12%" align="center"><select class="count2" name="qty_'.$productid.'" id="qty_'.$productid.'" onchange="javascript:set_cart('.$productid.');">
	';
				for($i2=0;$i2<=10;$i2++){
					$selected_str = ($cur_qty == $i2) ? ' selected' : '';
					echo '<option value="'.$i2.'"'.$selected_str.'>'.$i2.'</option>'."\n";
				}

	echo '
              </select></td>
          </tr>
	
	';
	
	$cur_qty = 0;//清除记录，防止下一下个不在购物车中的商品显示数量
	$cur_package = '';
}
?>

<script language='javascript'>
function set_cart(pd){
	
	var qty = document.getElementById("qty_"+pd).value;
	var pkg = document.getElementById("package_"+pd).value;
	
	if(pkg == ''){
		alert("請先選擇包裝！");
		return;
	}
	var feild_url = "?mode=setcart&pd="+pd+"&qty="+qty+"&pkg="+pkg;
	window.open("includes/cart_commend.php"+feild_url,"pagetmp");
}
function set_package(pd,pkg){
	var feild_url = "?mode=setpackage&pd="+pd+"&pkg="+pkg;
	
	window.open("includes/cart_commend.php"+feild_url,"pagetmp");
}
function set_payway(payway){
	var feild_url = "?mode=setpayway&payway="+payway;
	
	window.open("includes/cart_commend.php"+feild_url,"pagetmp");
}
</script>