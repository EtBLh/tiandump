<?php
$dm1_sql = "select * from `products` where `productid`='$pd'";//隱藏商品不顯示
require "fun/dm1.php";
if($dm1_count==0){//如果沒有獲取當前位置時
	header("Location: products.php");
	exit();
}else{
	$idx = 0;
	require "fun/getdata.php";
}

?>