<?php
$orderdate = date('Y-m-d',$orderdate);
$message = str_replace("\r\n","<br />" ,$message);
$body ='
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>匯款通知</title>
</head>

<body>
<div style="background-color:#fff">
	<div style="margin:0;margin:auto;width:700px;border:1px solid #ccc">
    	<div style="padding:0 10px">
        	<div style="padding:20px 10px;margin-bottom:15px;font-size:small;line-height:2em">
          		<div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:large">網站匯款通知信息。</div>
            	<div style="padding-left:24px">
	                <table style="width:100%;color:#333333;line-height:2.5em">
	                    <tbody>
	    				<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂單編號</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$ordersno.'</td>
	                    </tr>
	    				<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">會員姓名</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$name.'</td>
	                    </tr>
	    				<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂購日期</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$orderdate.'</td>
	                    </tr>
	    				<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂單金額</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$order_total.'</td>
	                    </tr>
						<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">匯出銀行代碼</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$bank_no.'</td>
	                    </tr>
						<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">匯出銀行後五碼</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$bank_order_no.'</td>
	                    </tr>
	                    <tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">聯絡電話</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$phone.'</td>
	                    </tr>
						<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">聯絡地址</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$address_city.$address_area.$address.'</td>
	                    </tr>
						<tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">備註</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$message.'</td>
	                    </tr>
	                    <tr>
	                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">後台地址</th>
	                        <td style="border-bottom:1px solid #ddd;padding:0 8px">詳細內容請登入網站管理後台：<a href="http://'.$_SERVER ['HTTP_HOST'].'/adm" target="_blank">'.$_SERVER ['HTTP_HOST'].'/adm</a></td>
	                    </tr>
	                	</tbody>
					</table>
                <div>
    		</div>
        </div>
	</div>
	<div style="width:700px;font-size:small;padding:5px 10px;border-top:1px dotted gray;text-align:right;background-color:#f2f2f2;line-height:1.7em">
        Copyright© 2008 Crown & Fancy Original. Taiwan., All Rights Reserved.
    </div>
</div>
</body>
</html>
';
?>