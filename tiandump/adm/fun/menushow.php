<?php
require_once "../fun/database.inc.php";
$dm1_sql = "select `fun1`,`fun2` from `sys_rights` where `mid`='".$_SESSION['asys']['adm']."'";
require "../fun/dm1.php";
//==============獲取用戶權限===================
$ta1 = array();
for ($i=0; $i<$dm1_count; $i++) {
	$fun1 = dm1('fun1', $i);
	$fun2 = dm1('fun2', $i);

	$ta1[] = $fun1 . $fun2;
}

include("menuset.inc.php");

$ti1 = count($mset);
$ti0 = -1;
for ($i=0; $i<$ti1; $i++) {
	$ti2 = count($mset[$i]);
	if ($ti2 == 0) continue;

	$ti0++;
	$menu[] = array($mset[$i][0]);

	for ($j=1; $j<$ti2; $j++) {
		$ta2 = explode('	', $mset[$i][$j]);
		if ($ta2[1] == 0) continue;		// 此專案不使用

		if (in_array("$i$j", $ta1) || $_SESSION['asys']['admlogid'] == 'admin') {
			$menu[$ti0][] = "$ta2[0]		$ta2[2]";
		}
	}
}
include("fun/menu.php");
?>