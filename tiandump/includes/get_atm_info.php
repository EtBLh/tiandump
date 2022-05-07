<?php
//-----------------讀取會員信息----------------------------------------------------------------------------
$dm1_sql = "select * from `orders_set` where `lang`='1'";
require "fun/dm1.php";
if($dm1_count > 0){
	$idx = 0;
	require "fun/getdata.php";
}
?>