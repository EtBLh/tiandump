<?php
$dm1_sql = "select * from `adset_banner` where `lang`='1' order by `seq` asc, `adcid` asc";
require "fun/dm1.php";
for($i=0;$i<$dm1_count;$i++)
{
	$ad_pic = dm1('ad_pic',$i);
	$ad_url = dm1('ad_url',$i);
	$ad_url_type = dm1('ad_url_type',$i);
	
	$ad_url_type = ($ad_url_type == 1) ? "_blank" : "_self";
	if($ad_url != ""){
		$ad_url = (stristr($ad_url,"http") === false) ? "http://" . $ad_url : $ad_url;
		$ad_pic_str = "<a href=\"$ad_url\" target=\"$ad_url_type\"><img src=\"upload/adset_banner/ad_pic/$ad_pic\"/></a>";
	}else{
		$ad_pic_str = "<img src=\"upload/adset_banner/ad_pic/$ad_pic\"/>";
	}

	echo '<li>'.$ad_pic_str.'</li>'."\n";
}
?>
				