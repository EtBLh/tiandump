<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("orders-payatm-note.inc.php");


if ($mode == 'add'){
	$orderdate = strtotime($orderdate);
	$order_note_date = strtotime($order_note_date);
	$exec = "insert into `orders_payatm_note` (`ordersno`,`name`,`orderdate`,`order_total`,`bank_no`,`bank_order_no`,`phone`,`address_city`,`address_area`,`address_zip`,`address`,`message`,`order_note_date`,`lang`) values (";
	$exec .= "'".$ordersno."',";
	$exec .= "'".$name."',";
	$exec .= "'".$orderdate."',";
	$exec .= "'".$order_total."',";
	$exec .= "'".$bank_no."',";
	$exec .= "'".$bank_order_no."',";
	$exec .= "'".$phone."',";
	$exec .= "'".$address_city."',";
	$exec .= "'".$address_area."',";
	$exec .= "'".$address_zip."',";
	$exec .= "'".$address."',";
	$exec .= "'".$message."',";
	$exec .= "'".$order_note_date."',";
	$exec .= "'".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$id = mysql_insert_id();

	echo "<script>alert('新增完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		

		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){
	$orderdate = strtotime($orderdate);
	$order_note_date = strtotime($order_note_date);
	$exec = "update `orders_payatm_note` set ";
	$exec .= "`ordersno`='".$ordersno."',";
	$exec .= "`name`='".$name."',";
	$exec .= "`orderdate`='".$orderdate."',";
	$exec .= "`order_total`='".$order_total."',";
	$exec .= "`bank_no`='".$bank_no."',";
	$exec .= "`bank_order_no`='".$bank_order_no."',";
	$exec .= "`phone`='".$phone."',";
	$exec .= "`address_city`='".$address_city."',";
	$exec .= "`address_area`='".$address_area."',";
	$exec .= "`address_zip`='".$address_zip."',";
	$exec .= "`address`='".$address."',";
	$exec .= "`message`='".$message."',";
	$exec .= "`order_note_date`='".$order_note_date."'";
	$exec .= " where `ofaqid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";


}
?>
