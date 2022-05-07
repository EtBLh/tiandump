<?php
$host_url = "http://" . $_SERVER ['HTTP_HOST'];

$orderdate = date('Y-m-d',$orderdate);
$sex = ($sex == 0) ? "先生" : "小姐";
$r_sex = ($r_sex == 0) ? "先生" : "小姐";

if($_SESSION['usys']['payway'] == 1):
	$payway = "ATM 轉帳匯款";
elseif($_SESSION['usys']['payway'] == 2):
	$payway = "貨到付款";
else:
	$payway = "";
endif;

$body='
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>訂單資訊</title>
</head>

<body>
<div style="background-color:#fff">
    <div style="margin:0;margin:auto;width:800px;border:1px solid #ccc">
        <div style="padding:0 10px">
        <div style="padding:20px 10px;margin-bottom:15px;font-size:small;line-height:2em">
          <div style="border-bottom:1px dotted #ccc;margin-bottom:15px;font-size:large">您的天字號水餃店訂單資訊如下</div>
            <div style="padding-left:24px">
            <table id="service_price_table" style="width:100%;color:#333333;line-height:2.5em">
			<tr>
			    <th width="300" style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:center;">商品</th>
			    <th width="150" style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:center;">包裝</th>
			    <th width="80" style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:center;">數 量</th>
			    <th width="80" style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:center;">單 價</th>
				<th width="90" style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:center;">小 計</th>
		    </tr>
    		'.$shop_list_str.'
    		</table>
		
			<table style="width:100%;color:#333333;line-height:2.5em">
                    <tbody><tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂單號</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$ordersno.'</p></td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">結賬方式</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$payway.'</p></td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">商品合計</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$product_total.'</p></td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">運費</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$ship_total.'</p></td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">手續費</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$cod_total.'</p></td>
                    </tr>
            		<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂單金額</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px"><p>'.$sub_total.'</p></td>
                    </tr>
                    <tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂購日期</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$orderdate.'</td>
                    </tr>
    				<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">訂購人</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$name.'</td>
                    </tr>
                    <tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">性 別</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$sex.'</td>
                    </tr>
                	<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">E-MAIL</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$member_email.'</td>
                    </tr>
    				<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">行動電話</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$phone.'</td>
                    </tr>
    				<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">聯絡地址</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$address_city.$address_area.$address.'</td>
                    </tr>
                    <tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">收件人</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$r_name.'</td>
                    </tr>
    				<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">性別</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$r_sex.'</td>
                    </tr>
                    <tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">行動電話</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$r_phone.'</td>
                    </tr>
    				<tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">送貨地址</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$r_address_city.$r_address_area.$r_address.'</td>
                    </tr>
                    <tr>
                        <th style="border:1px solid #c5c5c5;background-color:#f5f5f5;font-weight:normal;padding:0 8px;text-align:right;width:100px">希望配送時段</th>
                        <td style="border-bottom:1px solid #ddd;padding:0 8px">'.$liketime.'</td>
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