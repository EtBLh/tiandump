<?php
require_once "fun/strget.php";
$dm1_sql = "select * from `products` where `lang`='1' order by `seq` asc, `productid` desc limit 6";
require "fun/dm1.php";
$list_str = "";
for($i=0;$i<$dm1_count;$i++)
{
	$productid = dm1('productid',$i);
	$productt_pic = dm1('productt_pic',$i);
	$product_name = dm1('product_name',$i);
	$product_intro1 = dm1('product_intro1',$i);
	
	if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
		$product_name = u8_title_substr($product_name,20);
	}else{
		$product_name = cut_str($product_name, 20, 0, 'UTF-8'); 
	}
	
	$product_intro1 = cutstr_html($product_intro1,strlen($product_intro1));//清楚html，xml及php標簽
	if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
		$product_intro1 = u8_title_substr($product_intro1,50);
	}else{
		$product_intro1 = cut_str($product_intro1, 50, 0, 'UTF-8'); 
	}
	
	$list_str .= '
	  <div class="idx-products-box">
	  <div class="idx-products-img"><a href="products-detail.php?pd='.$productid.'"><img src="upload/products/productt_pic/'.$productt_pic.'" width="210" height="115" /></a></div>
	  <div class="idx-products-title"><a href="products-detail.php?pd='.$productid.'">'.$product_name.'</a></div>
	  <div class="idx-products-text">'.$product_intro1.'</div>
	  <div class="idx-products-more"><a href="products-detail.php?pd='.$productid.'">詳細介紹</a></div>
	  </div>
	'."\n";
	
	if($i > 0 && $i % 3 == 3-1){
		echo '<div class="idx-products-bbox">'.$list_str.'</div>'."\n";
		$list_str = "";
	}
}
if($list_str != ""){
	echo '<div class="idx-products-bbox">'.$list_str.'</div>'."\n";
	$list_str = "";
}
?>
				