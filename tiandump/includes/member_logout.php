<?php
session_start();
header("Content-type: text/html; charset=utf-8");

if($_SESSION['usys']['memberid'] ==''){
	echo "<script>alert('您尚未登入會員！');</script>\n";
	exit;
}
//=======清除登入時記錄的跳轉網址===============================================
unset($_SESSION['usys']['memberid']);

echo "<script>alert('登出成功！');</script>\n";
echo "<script>parent.location.href = '../login.php' ;</script>\n";

?>