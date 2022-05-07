<?php
if (! $dm1_data = @mysql_query($dm1_sql)) {
	exit("<script>alert(\"Error:1001: can not open SQL \");</script>");
	exit ();
}
$dm1_count = @mysql_num_rows($dm1_data);

if (! function_exists('dm1')) {
	function dm1($x,$y){
		global $dm1_data,$dm1_count;
		if ($dm1_count == 0) {
			return '';
		}else {
			return stripslashes(mysql_result($dm1_data, $y, $x));//用stripslashes 去除由addslashes對特殊字符添加的\
		}
	};
}
?>