<?php
//=================如果提交頁面的域名和當前頁面的域名不一致，則不允許操作==========================
//使用js的window.open無法獲取到HTTP_REFERER 所以在同一域名下也會提示錯誤
if(isset($_SERVER["HTTP_REFERER"])){
	if($_SERVER["HTTP_REFERER"] != ""){//為空可能是通過js的window.open傳值，為避免系統本身的js傳值，被阻止，所以忽略這一情況
		$server_name =$_SERVER['HTTP_HOST']; //獲取本站域名
		$server_len = strlen($server_name); //計算本站域名長度

		$sub_from = $_SERVER["HTTP_REFERER"]; //獲取來源的referer
		$sub_from = str_replace("http://","",$sub_from);
		$sub_from = str_replace("https://","",$sub_from);
		$sub_from = substr($sub_from,0,$server_len); //截取來源域名
		if($sub_from != $server_name){ //如果不相等,則終止
			echo "<script>alert('非法操作：錯誤的數據來源！');</script>\n";
		    exit;
		}
	}
}
?>