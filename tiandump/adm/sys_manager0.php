<?php
require_once "fun/check.php";
header("Content-type: text/html; charset=utf-8");

require_once "../fun/database.inc.php";
include("sys_manager.inc.php");


if ($mode == 'add'){
	if($logid == "admin"){
		echo "<script>alert('admin是系統帳戶，無法建立！');</script>\n";
		exit;
	}

	$exec = "insert into `sys_manager` (`logid`,`pwd`,`title`,`lang`) values (";
	$exec .= "'".$logid."',";
	$exec .= "'".$pwd."',";
	$exec .= "'".$title."',";
	$exec .= "'".$_SESSION['asys']['lang']."')";
	require "../fun/exec.php";
	$id = mysql_insert_id();

	reset($_POST);
	while(list($key, $val) = each($_POST)){
		
		$right_tmp = explode('_',$key);
		if ($right_tmp[0] != 'c') continue;

		$exec = "insert into `sys_rights` (`mid`,`fun1`,`fun2`) values (";
		$exec .= "'".$id."',";
		$exec .= "'".$right_tmp[1]."',";
		$exec .= "'".$right_tmp[2]."')";
		require "../fun/exec.php";
	}

	echo "<script>alert('新增完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}elseif ($mode == 'del'){

	$ta1 = explode(',', $ids);
	$ti1 = count($ta1);

	for ($i=0; $i<$ti1; $i++){
		

		$exec = "delete from `sys_rights` where `mid`='".$ta1[$i]."'";
		require "../fun/exec.php";

		$exec = "delete from `".$tb."` where `".$key."`='".$ta1[$i]."'";
		require "../fun/exec.php";
	}

	echo "<script>alert('刪除完畢');</script>\n";
	echo "<script>parent.location.href = parent.location.href;</script>\n";

}elseif ($mode == 'edit'){
	
	if($logid == "admin"){
		echo "<script>alert('admin是系統帳戶，無法建立！');</script>\n";
		exit;
	}
	$exec = "update `sys_manager` set ";
	$exec .= "`logid`='".$logid."',";
	$exec .= "`pwd`='".$pwd."',";
	$exec .= "`title`='".$title."',";
	$exec .= " where `mid`='".$id."'";
	require "../fun/exec.php";


	$exec = "delete from `sys_rights` where `mid`='".$id."'";
	require "../fun/exec.php";

	reset($_POST);
	while(list($key, $val) = each($_POST)){
		$right_tmp = explode('_',$key);
		if ($right_tmp[0] != 'c') continue;


		$exec = "insert into `sys_rights` (`mid`,`fun1`,`fun2`) values (";
		$exec .= "'".$id."',";
		$exec .= "'".$right_tmp[1]."',";
		$exec .= "'".$right_tmp[2]."')";
		require "../fun/exec.php";
	}

	echo "<script>alert('存檔完畢');</script>\n";
	echo "<script>parent.location.href = '$mwin.php';</script>\n";

}

?>
