<?php
/*			[page.inc]  翻頁工具	用法 :

	$countsql =  "select count(id) as t from customer where age>20";	// 務必要 as t
	$pagerows = 10;							// 每頁筆數

	include('page.inc');						// 表格上方翻頁

	$dm1_sql = "select * from customer where age>20 limit $currow,$pagerows";	// limit 後面要自己加上去
	include('dm1.inc');
	for ($i=0; $i<$dm1_count; $i++) :
		...
	endfor;
	include('page.inc');						// 表格下方翻頁

	// 註：一個網頁只能有一個翻頁工具，若要多個要修改 totalpages 變數名
*/


// 此檔可被呼叫多次，用在上下都顯示頁次
$dm3_sql = $countsql;
require "../fun/dm3.php";
$page_count = dm3('t', 0);
if($page_count_set != "" && $page_count_set != 0 && $page_count > $page_count_set){//當用戶設定讀取多少筆數據時
	$page_count = intval($page_count_set);
}
$totalpages = ceil($page_count / $pagerows);//總頁面
$curpage = (!isset($curpage) || $curpage == "" || $curpage >= $totalpages) ? 0 : $curpage;//當前頁面(如果用戶沒有選擇頁則默認顯示最後一頁)
$currow = $pagerows * $curpage;

if ($pagemode == -1) {					// 不顯示

}elseif (empty($pagemode)) {				// 無設定，預設為下拉方式
	if ($curpage > 0) {
		$ti1 = $curpage - 1;
		echo "<a href='javascript:fpage($curpage,$totalpages)'>第一頁</a> | ";
		echo "<a href='javascript:upage($curpage,$totalpages)'>上一頁</a>";
	}
	if ($curpage < $totalpages - 1)  {
		$ti1 = $curpage + 1;
		echo "<a href='javascript:dpage($curpage,$totalpages)'>下一頁</a> | ";
		echo "<a href='javascript:lpage($curpage,$totalpages)'>最後頁</a>";
	}

	echo "頁次：<select onchange='pag_change(this.value,$curpage,$totalpages)'>\n";
	for ($i=0; $i<$totalpages; $i++) {
		$tts1 = ($i == $curpage) ? ' selected' : '';
		$tti1 = $i + 1;
		echo "<option value='$i' $tts1>$tti1</option>\n";
	}
	echo "</select>";
}elseif ($pagemode == 1) {					// 數字列出模式
	if($curpage  <5){
		$for_start = 0;
	}else{
		$for_start = $curpage -4;
	}
	$for_end = (($for_start + 10) > $totalpages) ? $totalpages : ($for_start + 10);

	if($for_start > 0){
		echo "<a href='javascript:pag_change(0,$curpage,$totalpages)'>1</a>";
		echo "<strong>...</strong>";
	}
	for ($i=$for_start; $i<$for_end; $i++) {
		$ti1 = $i + 1;
		$ti1 = ($curpage == $i) ? "<strong>$ti1</strong>" : "$ti1";
		echo "<a href='javascript:pag_change($i,$curpage,$totalpages)'>$ti1</a>";
		if ($i < $for_end - 1) echo "│";
	}
	if($for_end < $totalpages){
		echo "<strong>...</strong>";
		echo "<a href='javascript:pag_change(($totalpages-1),$curpage,$totalpages)'>$totalpages</a>";
	}
}
?>