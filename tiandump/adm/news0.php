<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("news.inc.php");


if ($mode == 'add'){

	$news_date = strtotime($news_date);
	$exec = "insert into `news` (`news_title`,`news_date`,`news_intro`,`lang`) values (";
	$exec .= "'".$news_title."',";
	$exec .= "'".$news_date."',";
	$exec .= "'".$news_intro."',";
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

	$news_date = strtotime($news_date);
	$exec = "update `news` set ";
	$exec .= "`news_title`='".$news_title."',";
	$exec .= "`news_date`='".$news_date."',";
	$exec .= "`news_intro`='".$news_intro."'";
	$exec .= " where `newsid`='".$id."'";
	require "../fun/exec.php";


	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'sortsave'){

	$ta1 = explode(',', $ids);
	$ta2 = explode(',', $vals);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		$ta1[$i] = substr($ta1[$i], 3);
		$exec = "update `news` set `seq`='".$ta2[$i]."' where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('排序完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}
?>
