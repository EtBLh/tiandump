<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("products.inc.php");


if ($mode == 'add'){

	$exec = "insert into `products` (`product_name`,`product_unit`,`product_price`,`product_price2`,`product_intro1`,`lang`) values (";
	$exec .= "'".$product_name."',";
	$exec .= "'".$product_unit."',";
	$exec .= "'".$product_price."',";
	$exec .= "'".$product_price2."',";
	$exec .= "'".$product_intro1."',";
	$exec .= "'".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$id = mysql_insert_id();
	$dir = '../upload/products/productt_pic';
	$field = 'productt_pic';
	require "../fun/upload.php";

	echo "<script>alert('新增完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		
		$dir = '../upload/products/productt_pic';
		$field = 'productt_pic';
		require "../fun/delfile.inc.php";

		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){

	$exec = "update `products` set ";
	$exec .= "`product_name`='".$product_name."',";
	$exec .= "`product_unit`='".$product_unit."',";
	$exec .= "`product_price`='".$product_price."',";
	$exec .= "`product_price2`='".$product_price2."',";
	$exec .= "`product_intro1`='".$product_intro1."'";
	$exec .= " where `productid`='".$id."'";
	require "../fun/exec.php";

	$dir = '../upload/products/productt_pic';
	$field = 'productt_pic';
	require "../fun/upload.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'sortsave'){

	$ta1 = explode(',', $ids);
	$ta2 = explode(',', $vals);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		$ta1[$i] = substr($ta1[$i], 3);
		$exec = "update `products` set `seq`='".$ta2[$i]."' where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('排序完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}
?>
