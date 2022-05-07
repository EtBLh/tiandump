<?php
$body='
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>會員註冊帳號信息</title>
</head>

<body>
<div style="background-color:#fff">
    <div style="margin:0;margin:auto;width:700px;border:1px solid #ccc">
        <div style="padding:0 10px">
        <div style="padding:20px 10px;margin-bottom:15px;font-size:small;line-height:2em">
          	<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:large">感謝您註冊成爲天字號水餃舘會員，您的帳號信息如下:</div>
		  	<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:10pt">會員詳細信息，請登入“<a href="http://'.$_SERVER['HTTP_HOST'].'/member.php">http://'.$_SERVER['HTTP_HOST'].'/member.php</a>”</div>
			<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:10pt">帳號: '.$reg_logid.'</div>
			<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:10pt">密碼: '.$reg_pwd.'</div>
			<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:12pt">再次謝謝您的註冊，請妥善保管您的帳號信息！</div>
        </div>
    	<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:8pt;text-align:right;background-color:#f2f2f2;">
			Copyright© 2008 Crown & Fancy Original. Taiwan., All Rights Reserved.
		</div>
		</div>
    </div>
</div>
</body>
</html>
';
?>