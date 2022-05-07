<?php
	require_once "fun/check.php";
	if($_SESSION['asys']['lang'] == 1){
		$lang_str = "中文";
	}elseif($_SESSION['asys']['lang'] == 2){
		$lang_str = "英文";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?> - 管理頁面</title>
<script language=JavaScript>
function logout(){
	if (confirm("確定要登出管理員嗎？"))
	top.location = "main_logout.php";
	return false;
}
</script>
<link href="css/skin.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0">
<table width="100%" height="64" border="0" cellpadding="0" cellspacing="0" class="admin_topbg">
  <tr>
    <td width="61%" height="64"><img src="images/logo.gif" width="262" height="64"></td>
    <td width="39%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="74%" height="38" class="admin_txt">
    		<img src="images/nofollow.gif" border="0">前台語言：<b><?php echo $lang_str;?></b>  &nbsp;&nbsp;&nbsp;
    		<img src="images/nofollow.gif" border="0">帳號：<b><?php echo $_SESSION['asys']['admlogid'];?></b> 您好,感謝登入使用！
    	</td>
        <td width="22%" height="38"><img src="images/out.gif" onClick="logout();" width="46" height="20" border="0" alt="登出"></td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td height="19" colspan="3">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
