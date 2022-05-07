<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<table class="form_table member_form" width="930" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
           <th width="28%">* 電子郵件：</th>
           <td width="33%"><input class="input add" id="textfield2" size="15" name="name" /></td>
           <td width="39%"><p>例：XXXXXX@hopebear.com.tw<br />系統將寄發啟用信件至您的電子信箱<br />請確認是否填寫正確</p></td>
        </tr>
         <tr>
           <th width="28%">* 密 碼：</th>
           <td width="33%"><input class="input add" id="textfield2" size="15" name="name" type="password" /></td>
           <td width="39%"><p>請輸入8-16個字元，英文與數字組合
            </p>
            <p>例：1h48Gg9ek25</p></td>
        </tr>
        <tr>
           <th width="28%">* 密碼確認：</th>
           <td width="33%"><input class="input add" id="textfield2" size="15" name="name" type="password" /></td>
           <td width="39%"><p>請再輸入一次密碼</p></td>
        </tr>
        <tr>
           <th width="28%">* 姓 名：</th>
           <td width="33%"><input class="input add" id="textfield2" size="15" name="name" /></td>
           <td width="39%"><p>若您希望以信用卡付款</p>
            <p>您所輸入的姓名必須與信用卡相符</p></td>
        </tr>
        <tr>
        	 <th width="28%">* 生 日：</th>
           <td width="33%">
           	 <select class="form_select birth">
                <option value=""> 年分</option><option value="">1920</option><option value="">1921</option><option value="">1922</option><option value="">1923</option><option value="">1924</option><option value="">1925</option>
                <option value="">1926</option><option value="">1927</option><option value="">1928</option><option value="">1929</option><option value="">1930</option>
                <option value="">1931</option><option value="">1932</option><option value="">1933</option><option value="">1934</option><option value="">1935</option>
                <option value="">1936</option><option value="">1937</option><option value="">1938</option><option value="">1939</option><option value="">1940</option>
                <option value="">1941</option><option value="">1942</option><option value="">1943</option><option value="">1944</option><option value="">1945</option>
                <option value="">1946</option><option value="">1947</option><option value="">1948</option><option value="">1949</option><option value="">1950</option>
                <option value="">1951</option><option value="">1952</option><option value="">1953</option><option value="">1954</option><option value="">1955</option>
                <option value="">1956</option><option value="">1957</option><option value="">1958</option><option value="">1959</option><option value="">1960</option>
                <option value="">1961</option><option value="">1962</option><option value="">1963</option><option value="">1964</option><option value="">1965</option>
                <option value="">1966</option><option value="">1967</option><option value="">1968</option><option value="">1969</option><option value="">1970</option>
                <option value="">1971</option><option value="">1972</option><option value="">1973</option><option value="">1974</option><option value="">1975</option>
                <option value="">1976</option><option value="">1977</option><option value="">1978</option><option value="">1979</option><option value="">1980</option>
                <option value="">1981</option><option value="">1982</option><option value="">1983</option><option value="">1984</option><option value="">1985</option>
                <option value="">1986</option><option value="">1987</option><option value="">1988</option><option value="">1989</option><option value="">1980</option>
                <option value="">1991</option><option value="">1992</option><option value="">1993</option><option value="">1994</option><option value="">1995</option>
                <option value="">1996</option><option value="">1997</option><option value="">1998</option><option value="">1999</option><option value="">2000</option>
                <option value="">2001</option><option value="">2002</option><option value="">2003</option><option value="">2004</option><option value="">2005</option>
                <option value="">2006</option><option value="">2007</option><option value="">2008</option><option value="">2009</option><option value="">2010</option>
                <option value="">2011</option><option value="">2012</option><option value="">2013</option><option value="">2014</option><option value="">2015</option>
                <option value="">2016</option><option value="">2017</option><option value="">2018</option><option value="">2019</option><option value="">2020</option>
              </select>
              <select class="form_select birth" >
                <option value="">月份</option><option value="">01</option><option value="">02</option><option value="">03</option><option value="">04</option><option value="">05</option>
                <option value="">06</option><option value="">07</option><option value="">08</option><option value="">09</option><option value="">10</option><option value="">11</option><option value="">12</option>
              </select>
              <select class="form_select birth" >
                <option value="">日期</option><option value="">01</option><option value="">02</option><option value="">03</option><option value="">04</option><option value="">05</option>
                <option value="">06</option><option value="">07</option><option value="">08</option><option value="">09</option><option value="">10</option>
                <option value="">11</option><option value="">12</option><option value="">13</option><option value="">14</option><option value="">15</option>
                <option value="">16</option><option value="">17</option><option value="">18</option><option value="">19</option><option value="">20</option>
                <option value="">21</option><option value="">2</option><option value="">23</option><option value="">24</option><option value="">25</option>
                <option value="">26</option><option value="">27</option><option value="">28</option><option value="">29</option><option value="">30</option>
                <option value="">31</option>
              </select>
           </td>
           <td width="39%"><p>HB 將不定時舉辦促銷折扣活動</p>
            <p>請確認填寫是否正確</p></td>
        </tr>
        <tr>
           <th width="28%">* 手機 / 電話：</th>
           <td width="33%"><input class="input short" id="textfield2" size="15" name="name" /> - <input class="input phone" id="textfield2" size="15" name="name" /></td>
           <td width="39%"><p>例：0912-345678 / 02-22345678</p></td>
        </tr>
        <tr>
           <th width="28%">* 縣市：</th>
           <td width="33%">
           	 <select class="form_select zip">
                <option value=""> -- 請選擇縣市 -- </option>
                <option value="宜蘭縣">宜蘭縣</option>
                <option value="基隆市">基隆市</option>
                <option value="台北市">台北市</option>
                <option value="新北市">新北市</option>
                <option value="桃園縣">桃園縣</option>
                <option value="新竹市">新竹市</option>
                <option value="新竹縣">新竹縣</option>
                <option value="苗栗縣">苗栗縣</option>
                <option value="台中市">台中市</option>
                <option value="南投縣">南投縣</option>
                <option value="彰化縣">彰化縣</option>
                <option value="雲林縣">雲林縣</option>
                <option value="嘉義市">嘉義市</option>
                <option value="嘉義縣">嘉義縣</option>
                <option value="台南市">台南市</option>
                <option value="高雄市">高雄市</option>
                <option value="屏東縣">屏東縣</option>
                <option value="台東縣">台東縣</option>
                <option value="花蓮縣">花蓮縣</option>
                <option value="澎湖縣">澎湖縣</option>
                <option value="金門縣">金門縣</option>
                <option value="連江縣">連江縣</option>
                <option value="釣魚台">釣魚台</option>
                <option value="南海島">南海島</option>
              </select>
              <select class="form_select zip" >
                <option value=""> -- 請選擇區域 -- </option>
                <option value="320中壢市">320中壢市</option>
                <option value="324平鎮市">324平鎮市</option>
                <option value="325龍潭鄉">325龍潭鄉</option>
                <option value="326楊梅鎮">326楊梅鎮</option>
                <option value="327新屋鄉">327新屋鄉</option>
                <option value="328觀音鄉">328觀音鄉</option>
                <option value="330桃園市">330桃園市</option>
                <option value="333龜山鄉">333龜山鄉</option>
                <option value="334八德市">334八德市</option>
                <option value="335大溪鎮">335大溪鎮</option>
                <option value="336復興鄉">336復興鄉</option>
                <option value="337大園鄉">337大園鄉</option>
                <option value="338蘆竹鄉">338蘆竹鄉</option>
              </select>
           </td>
           <td width="39%"></td>
        </tr>
         <tr>
           <th width="28%">* 地址：</th>
           <td width="33%"><input class="input add" id="textfield2"  name="name"/></td>
           <td width="39%"><p>您的發票將郵寄到這個地址</p>
            <p>請確認是否填寫正確</p></td>
        </tr>
    </table>

</body>
</html>