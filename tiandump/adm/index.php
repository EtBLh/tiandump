<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網站管理後台</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
-->
</style>
<link href="css/skin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript">
function reloadImage(url){ 
	document.getElementById("codeimg").src= url + "?" + Math.random();
}
</script>
</head>
<body>
<table width="100%" height="166" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="42" valign="top"><table width="100%" height="42" border="0" cellpadding="0" cellspacing="0" class="login_top_bg">
      <tr>
        <td width="1%" height="21">&nbsp;</td>
        <td height="42">&nbsp;</td>
        <td width="17%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="49%" align="right"><table width="91%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg2">
            <tr>
              <td height="138" valign="top"><table width="89%" height="427" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="149">&nbsp;</td>
                </tr>
                <tr>
                  <td height="80" align="right" valign="top"><img src="images/logo.png" width="279" height="68"></td>
                </tr>
                <tr>
                  <td height="198" align="right" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td width="30%" height="40"></td>
                      <td width="35%"><img src="images/ghome.gif" width="16" height="16"><a href="../" class="left_txt3"> 回前端首頁</a></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            
        </table></td>
        <td width="1%" >&nbsp;</td>
        <td width="50%" valign="bottom"><table width="100%" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="96%" height="38"><span class="login_txt_bt">登入系統</span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="21"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table211" height="328">
                  <tr>
                    <td height="164" colspan="2" align="middle">
                    	<form name="myform" action="main_login.php" method="post" target="tmp">
                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
                          <tr>
                            <td width="13%" height="35"><span class="login_txt">帳號：</span></td>
                            <td height="35" colspan="2"><input name="t1"  style="width:152px;height:20px;" /></td>
                          </tr>
                          <tr>
                            <td width="13%" height="35"><span class="login_txt">密碼：</span></td>
                            <td height="35" colspan="2"><input name="t2" type="password"  style="width:152px;height:20px;" /><img src="images/luck.gif" width="19" height="18"> </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35"><span class="login_txt">前端語言：</span></td>
                            <td height="35" colspan="2">
                            	<select name="t3" style="width:152px;height:20px;">
								<?php
								$ta1 = file('lang.ini');
								$ti1 = count($ta1);
								for ($i=0; $i<$ti1; $i++) {
									$ta2 = explode('=', $ta1[$i]);
									echo "<option value=\"$ta2[0]\">$ta2[1]</option>";
								}
								?>
								</select>
                            </td>
                          </tr>
                          <tr>
                            <td width="13%" height="35" ><span class="login_txt">驗證碼：</span></td>
                            <td height="35" colspan="2"><input name="jude" type="text"  style="width:152px;height:20px;" /></td>
                          </tr>
                          <tr>
                            <td height="35" >&nbsp;</td>
                            <td width="17%" height="35">
                            	<img id="codeimg" name="codeimg" src="../fun/code.php" onclick="javascript:reloadImage('../fun/code.php');" width="90" height="20" align="absbottom" />
                            </td>
                            <td width="70%"><input name="Submit" type="image" src="images/Login_but.gif" tabindex="-1"  style="width:62px;height:22px;"></td>
                          </tr>
                        </table>
                    </form>
                    </td>
                  </tr>
                  <tr>
                    <td width="433" height="164" align="right" valign="bottom"><img src="images/login-wel.gif" width="242" height="138"></td>
                    <td width="57" align="right" valign="bottom">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt">Copyright &copy; 2009-2012</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<iframe name="tmp" style="display:none"></iframe>
</body>
</html>