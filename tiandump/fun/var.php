<?php
/*	
	用該功能建立與post中的變量相同的變量
	檢查變量的合法性防止sql注入
	同時解決 magic_quote、register_globals 問題，
	若沒有 magic_quote，所以存檔前要 addslashes() 對特殊字符進行轉義添加\符號
	若沒有 register_globals，php 不會自動用 $_POST 來建立變數
*/

function inject_check($field_val) {
   	$check_flag = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/', $field_val);     // 進行過濾防止sql注入
	if($check_flag){
		echo "<script>alert(\"注入非法數據！\");</script>\n";
		exit();
   	}
}

if (count($_POST) > 0){				// 若有 post 東西進來
	reset($_POST);
	while(list($tkey, $val) = each($_POST)) {
		inject_check($val);
		if ( get_magic_quotes_gpc() == 1) {		// 若設定 magic quote
			$$tkey = $_POST[$tkey] = $val;
		}else{
			$$tkey = $_POST[$tkey] = addslashes($val);	// 存入 mysql 前加上 slash
		}
	}

}elseif (count($_GET) > 0) {			// 因為我決不會同時 get 又 post，但某些怪胎可能會
	reset($_GET);
	while(list($tkey, $val) = each($_GET)) {
		inject_check($val);//檢測參數
		if (get_magic_quotes_gpc() == 1) {//如果開啓了magic_quotes_gpc，環境會對特殊字符自動加反斜杠處理（addslashes）
			$$tkey = $_GET[$tkey] = $val;
		}else{
			$$tkey = $_GET[$tkey] = addslashes($val);
		}
	}
}
?>