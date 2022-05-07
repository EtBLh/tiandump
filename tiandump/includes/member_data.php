<?php
//-----------------讀取會員信息----------------------------------------------------------------------------
$dm1_sql = "select * from `member` where `memberid`='".$_SESSION['usys']['memberid']."'";
require "fun/dm1.php";
if($dm1_count > 0){
	$idx = 0;
	require "fun/getdata.php";
}
?>