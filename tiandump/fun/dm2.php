<?php
if (! $dm2_data = @mysql_query($dm2_sql)) {
	exit("<script>alert(\"Error:1002: can not open SQL \");</script>");
	exit ();
}
$dm2_count = @mysql_num_rows($dm2_data);

if (! function_exists('dm2')) {
	function dm2($x,$y){
		global $dm2_data,$dm2_count;
		if ($dm2_count == 0) {
			return '';
		}else {
			return stripslashes(mysql_result($dm2_data, $y, $x));//用stripslashes 去除由addslashes對特殊字符添加的\
		}
	};
}
?>