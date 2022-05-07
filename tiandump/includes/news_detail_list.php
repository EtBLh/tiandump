<?php
require_once "fun/strget.php";
$dm2_sql = "select * from `news` where `lang`='1' and `newsid`<>'".$id."' order by `seq` asc, `newsid` desc limit 5";
require_once "fun/dm2.php";
for($i=0;$i<$dm2_count;$i++)
{
	$newsid = dm2('newsid',$i);
	$news_title = dm2('news_title',$i);
	$news_date = dm2('news_date',$i);
	
	$news_date = date('Y-m-d',$news_date);
	//$news_title = cutstr_html($news_title,strlen($news_title));//清楚html，xml及php標簽
	if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
		$news_title = u8_title_substr($news_title,50);
	}else{
		$news_title = cut_str($news_title, 50, 0, 'UTF-8'); 
	}
	echo '
	<tr>
	  <td width="64%" height="27" ><a href="news-detail.php?id='.$newsid.'">【'.$news_date.'】 '.$news_title.'</a></td>
	  </tr>
	<tr>
	'."\n";
}
?>
				