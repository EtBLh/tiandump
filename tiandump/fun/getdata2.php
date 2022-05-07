<?php
if (! isset($idx)) $idx = 0;

$ti9 = mysql_num_fields($dm2_data);
for ($m=0; $m<$ti9; $m++) {
	$ts9 = mysql_field_name($dm2_data, $m);
	$$ts9 = dm2($ts9, $idx);
}
?>