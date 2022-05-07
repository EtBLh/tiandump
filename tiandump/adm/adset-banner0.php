<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("adset-banner.inc.php");


if ($mode == 'add'){

	$exec = "insert into `adset_banner` (`ad_url`,`ad_url_type`,`lang`) values (";
	$exec .= "'".$ad_url."',";
	$exec .= "'".$ad_url_type."',";
	$exec .= "'".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$id = mysql_insert_id();
	$dir = '../upload/adset_banner/ad_pic';
	$field = 'ad_pic';
	require "../fun/upload.php";

	echo "<script>alert('新增完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		
		$dir = '../upload/adset_banner/ad_pic';
		$field = 'ad_pic';
		require "../fun/delfile.inc.php";

		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){

	$exec = "update `adset_banner` set ";
	$exec .= "`ad_url`='".$ad_url."',";
	$exec .= "`ad_url_type`='".$ad_url_type."'";
	$exec .= " where `adcid`='".$id."'";
	require "../fun/exec.php";

	$dir = '../upload/adset_banner/ad_pic';
	$field = 'ad_pic';
	require "../fun/upload.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'sortsave'){

	$ta1 = explode(',', $ids);
	$ta2 = explode(',', $vals);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		$ta1[$i] = substr($ta1[$i], 3);
		$exec = "update `adset_banner` set `seq`='".$ta2[$i]."' where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('排序完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}
?>
