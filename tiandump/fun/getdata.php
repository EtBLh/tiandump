<?php
if (! isset($idx)) $idx = 0;

$ti9 = mysql_num_fields($dm1_data);
for ($m=0; $m<$ti9; $m++) {
	$ts9 = mysql_field_name($dm1_data, $m);
	$$ts9 = dm1($ts9, $idx);
}
?>