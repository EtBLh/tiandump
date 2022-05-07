<?php
//=========================獲取當前數據===================================================================
$dm1_sql = "select * from `news` where `newsid`='".$id."' and `lang`='1'";
require "fun/dm1.php";
if($dm1_count == 0){
	header("Location: news.php");
	exit();
}else{
	$idx = 0;
	require "fun/getdata.php";
	$news_date = date('Y-m-d',$news_date);
}
?>