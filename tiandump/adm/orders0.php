<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("orders.inc.php");


if ($mode == 'add'){


}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		

		$exec = "delete from `orders_data` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
		
		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){
	$byear = strtotime($byear);
	$orderdate = strtotime($orderdate);
	$exec = "update `orders` set ";
	$exec .= "`ordersno`='".$ordersno."',";
	$exec .= "`memberid`='".$memberid."',";
	$exec .= "`member_email`='".$member_email."',";
	$exec .= "`name`='".$name."',";
	$exec .= "`phone`='".$phone."',";
	$exec .= "`byear`='".$byear."',";
	$exec .= "`address_city`='".$address_city."',";
	$exec .= "`address_area`='".$address_area."',";
	$exec .= "`address_zip`='".$address_zip."',";
	$exec .= "`address`='".$address."',";
	$exec .= "`r_name`='".$r_name."',";
	$exec .= "`r_phone`='".$r_phone."',";
	$exec .= "`r_address_city`='".$r_address_city."',";
	$exec .= "`r_address_area`='".$r_address_area."',";
	$exec .= "`r_address_zip`='".$r_address_zip."',";
	$exec .= "`r_address`='".$r_address."',";
	$exec .= "`liketime`='".$liketime."',";
	$exec .= "`note`='".$note."',";
	$exec .= "`payway`='".$payway."',";
	$exec .= "`product_total`='".$product_total."',";
	$exec .= "`cod_total`='".$cod_total."',";
	$exec .= "`ship_total`='".$ship_total."',";
	$exec .= "`order_total`='".$order_total."',";
	$exec .= "`orderdate`='".$orderdate."',";
	$exec .= "`orderflag`='".$orderflag."'";
	$exec .= " where `ordersid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";

}

?>
