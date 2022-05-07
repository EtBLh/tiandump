<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("products-package.inc.php");


if ($mode == 'add'){

	$exec = "insert into `products_package` (`package_title`,`lang`) values (";
	$exec .= "'".$package_title."',";
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

	$exec = "update `products_package` set ";
	$exec .= "`package_title`='".$package_title."'";
	$exec .= " where `pkindoid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'sortsave'){

	$ta1 = explode(',', $ids);
	$ta2 = explode(',', $vals);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		$ta1[$i] = substr($ta1[$i], 3);
		$exec = "update `products_package` set `seq`='".$ta2[$i]."' where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('排序完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}
?>
