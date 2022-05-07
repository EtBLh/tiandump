<?php
$body='
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>忘記密碼信件</title>
</head>

<body>
<div style="background-color:#fff">
    <div style="margin:0;margin:auto;width:800px;border:1px solid #ccc">
        <div style="padding:0 10px">
        <div style="padding:20px 10px;margin-bottom:15px;font-size:small;line-height:2em">
          <div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:large">您的帳號密碼如下，請妥善保管！</div>
            <div style="padding-left:24px">
				<table style="width:100%;color:#333333;line-height:2.5em">
                    <tbody><tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">帳號</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$lost_logid.'</p></td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">密碼</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$password.'</p></td>
                    </tr>
                </tbody></table>
                <br>
                <div></div>
            </div>
        </div>
        </div>
        <div style="font-size:small;padding:5px 10px;border-top:1px dotted gray;text-align:right;background-color:#f2f2f2;line-height:1.7em">
            Copyright© 2008 Crown & Fancy Original. Taiwan., All Rights Reserved.
        </div>
  </div>
</div>
</body>
</html>
';
?>