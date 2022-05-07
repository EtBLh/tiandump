<?php
require_once "fun/strget.php";
$where_sql = "where `lang`='1'";

$countsql =  "select count(`newsid`) as `t` from `news` ".$where_sql;
$pagerows = 10;
$pagemode = -1;
require "fun/page.php";

$dm1_sql = "select * from `news` ".$where_sql." order by `seq` asc, `newsid` desc limit ".$currow.",".$pagerows;
require "fun/dm1.php";
$sn = $all_count - $currow;
for($i=0;$i<$dm1_count;$i++)
{
	$newsid = dm1('newsid',$i);
	$news_title = dm1('news_title',$i);
	$news_date = dm1('news_date',$i);
	
	$news_date = date('Y-m-d',$news_date);
	
	//$news_title = cutstr_html($news_title,strlen($news_title));//清楚html，xml及php標簽
	if(substr(phpversion(), 0, 1) == '5'){//php版本為5時
		$news_title = u8_title_substr($news_title,50);
	}else{
		$news_title = cut_str($news_title, 50, 0, 'UTF-8'); 
	}

	echo '
	<tr>
	<td width="8%" height="27" align="center">'.$sn.'</td>
	<td class="td_padding" width="73%"><a href="news-detail.php?id='.$newsid.'">'.$news_title.'</a></td>
	<td width="19%" align="center">'.$news_date.'</td>
	</tr>
	'."\n";
	$sn--; 
}

?>