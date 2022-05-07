<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("contact.inc.php");


if ($mode == 'add'){

	$send_date = strtotime($send_date);
	$exec = "insert into `contact` (`name`,`tel`,`email`,`subject`,`message`,`send_date`,`lang`) values (";
	$exec .= "'".$name."',";
	$exec .= "'".$tel."',";
	$exec .= "'".$email."',";
	$exec .= "'".$subject."',";
	$exec .= "'".$message."',";
	$exec .= "'".$send_date."',";
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

	$send_date = strtotime($send_date);
	$exec = "update `contact` set ";
	$exec .= "`name`='".$name."',";
	$exec .= "`tel`='".$tel."',";
	$exec .= "`email`='".$email."',";
	$exec .= "`subject`='".$subject."',";
	$exec .= "`message`='".$message."',";
	$exec .= "`send_date`='".$send_date."'";
	$exec .= " where `contactid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";


}
?>
