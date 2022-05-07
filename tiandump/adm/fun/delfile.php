<?php
	require_once "check.php";
	header("Content-type: text/html; charset=utf-8");
	
	require_once "../../fun/database.inc.php";

	$dir = "../../upload/$tb/$field/$filename";
	if ($filename != '' && file_exists("$dir")){
		unlink("$dir");

		$exec = "update `".$tb."` set ";
		$exec .= "`".$field."`=''";
		$exec .= " where `".$keyname."`='".$id."'";
		require "../../fun/exec.php";
		
		echo "<script>alert('刪除成功');</script>";
		echo "<script>parent.location.href=parent.location.href;</script>";
	}else{
		echo "<script>alert('文件不存在');</script>";
	}
	
?>