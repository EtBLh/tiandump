<?php
if (! $dm3_data = @mysql_query($dm3_sql)) {
	exit("<script>alert(\"Error:1003: can not open SQL \");</script>");
	exit ();
}
$dm3_count = @mysql_num_rows($dm3_data);

if (! function_exists('dm3')) {
	function dm3($x,$y){
		global $dm3_data,$dm3_count;
		if ($dm3_count == 0) {
			return '';
		}else {
			return stripslashes(mysql_result($dm3_data, $y, $x));//用stripslashes 去除由addslashes對特殊字符添加的\
		}
	}
}
?>