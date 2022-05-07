<?php
$product_total = 0;
$cart_count = count($_SESSION['usys']['cart']);
if($cart_count > 0){
	reset($_SESSION['usys']['cart']);
	for($i=0; $i<$cart_count; $i++){
		//==========================讀取商品基本信息更============================================================================
		$dm1_sql ="select * from `products` where `productid`='" . $_SESSION['usys']['cart'][$i][0] . "'";
		require "fun/dm1.php";
		$product_name = dm1('product_name',0);
		$product_price2 = dm1('product_price2',0);
		$productt_pic = dm1('productt_pic',0);

		$product_total_xiaoji = intval($product_price2) * intval($_SESSION['usys']['cart'][$i][1]);//金額小計
		$product_total += $product_total_xiaoji;//商品總計
		
		echo '
		<tr>
		<td width="19%" align="left" class="p_left20"><img src="upload/products/productt_pic/'.$productt_pic.'" /></td>
		<td width="36%" align="left">'.$product_name.'</td>
		<td width="15%" align="left">'.$_SESSION['usys']['cart'][$i][2].'</td>
		<td width="10%" align="center"><span class="price">'.$product_price2.'</span></td>
		<td width="20%" align="center">'.$_SESSION['usys']['cart'][$i][1].'</td>
		</tr>
		';
	}
	//============計算運費和手續費==========================================================================================
	$dm1_sql = "select * from `orders_set` where `lang`='1'";
	require "fun/dm1.php";
	if($dm1_count > 0){
		$set_ship_total = dm1('ship_total',0);
		$set_ship_line_total = dm1('ship_line_total',0);
		$set_cod_total = dm1('cod_total',0);
		$set_cod_line_total = dm1('cod_line_total',0);
	}else{
		$set_ship_total = 0;
		$set_ship_line_total = 0;
		$set_cod_total = 0;
		$set_cod_line_total = 0;
	}
	$ship_total = ($product_total >= $set_ship_line_total) ? 0 : $set_ship_total;
	$cod_total = ($product_total >= $set_cod_line_total) ? 0 : $set_cod_total;

	//==================計算最後總金額=========================================================================
	$sub_total = intval($product_total) + intval($ship_total)+ intval($cod_total);// 


}else{
	echo '<tr><td colspan="5" align="center">購物車中沒有選購商品！</td></tr>';
}
?>
