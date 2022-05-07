<?php
/*清除html代碼*/
function cutstr_html($string, $sublen)    
{
  $string = strip_tags($string);
  $string = str_replace("\r\n","",$string);
  $string = preg_replace ('/\n/is', '', $string);
  $string = preg_replace ('/ |　/is', '', $string);
  $string = preg_replace ('/&nbsp;/is', '', $string);
  preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string);   
  if(count($t_string[0]) - 0 > $sublen) $string = join('', array_slice($t_string[0], 0, $sublen))."…";   
  else $string = join('', array_slice($t_string[0], 0, $sublen));
    return $string;
}

/**  
 * 截取UTF8编码字符串从首字节开始指定宽度(非长度), 适用于字符串长度有限的如新闻标题的等宽度截取  
 * 中英文混排情况较理想. 全中文与全英文截取后对比显示宽度差异最大,且截取宽度远大越明显.  
 * @param string $str   UTF-8 encoding  
 * @param int[option] $width 截取宽度  
 * @param string[option] $end 被截取后追加的尾字符  
 * @param float[option] $x3<p>  
 *  3字节（中文）字符相当于希腊字母宽度的系数coefficient（小数）  
 *  中文通常固定用宋体,根据ascii字符字体宽度设定,不同浏览器可能会有不同显示效果</p>  
 *  
 * @return string  
 * @author waiting  
 */
function u8_title_substr($str, $width = 0, $end = '…', $x3 = 0) {   
    global $CFG; // 全局变量保存 x3 的值   
    if ($width <= 0 || $width >= strlen($str)) {   
        return $str;   
    }   
    $arr = str_split($str);   
    $len = count($arr);   
    $w = 0;   
    $width *= 10;   
  
    // 不同字节编码字符宽度系数   
    $x1 = 11;   // ASCII   
    $x2 = 16;   
    $x3 = $x3===0 ? ( $CFG['cf3']  > 0 ? $CFG['cf3']*10 : $x3 = 21 ) : $x3*10;   
    $x4 = $x3;   
  
    for ($i = 0; $i < $len; $i++) {   
        if ($w >= $width) {   
            $e = $end;   
            break;   
        }   
        $c = ord($arr[$i]);   
        if ($c <= 127) {   
            $w += $x1;   
        }   
        elseif ($c >= 192 && $c <= 223) { // 2字节头   
            $w += $x2;   
            $i += 1;   
        }   
        elseif ($c >= 224 && $c <= 239) { // 3字节头   
            $w += $x3;   
            $i += 2;   
        }   
        elseif ($c >= 240 && $c <= 247) { // 4字节头   
            $w += $x4;   
            $i += 3;   
        }   
    }   
  
    return implode('', array_slice($arr, 0, $i) ). $e;   
}  

/* 
Utf-8、gb2312都支持的汉字截取函数 
cut_str(字符串, 截取长度, 开始长度, 编码); 
编码默认为 utf-8 
开始长度默认为 0 
*/
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') 
{ 
if($code == 'UTF-8') 
{ 
$pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; 
preg_match_all($pa, $string, $t_string); if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)).""; 
return join('', array_slice($t_string[0], $start, $sublen)); 
} 
else 
{ 
$start = $start*2; 
$sublen = $sublen*2; 
$strlen = strlen($string); 
$tmpstr = ''; for($i=0; $i<$strlen; $i++) 
{ 
if($i>=$start && $i<($start+$sublen)) 
{ 
if(ord(substr($string, $i, 1))>129) 
{ 
$tmpstr.= substr($string, $i, 2); 
} 
else 
{ 
$tmpstr.= substr($string, $i, 1); 
} 
} 
if(ord(substr($string, $i, 1))>129) $i++; 
} 
if(strlen($tmpstr)<$strlen ) $tmpstr.= "…"; 
return $tmpstr; 
} 
}

?> 