<?php
if (! isset($sqlServerIp)){
	$sqlServerIp = 'localhost:3306';
	$UserName = 'root';
	$Password = 'root';
	$DBName = 'tiandump';

	if (@mysql_connect($sqlServerIp, $UserName, $Password)){
		mysql_query("SET NAMES utf8");
		if (! @mysql_select_db($DBName)){
			exit("<script>alert('SQL Server connected , But database could not open')</script>");
		}
	}elseif ($_SERVER['HTTP_HOST'] == "localhost:3306"){
		$sqlServerIp = 'localhost:3306';
		$UserName = 'jack6406';
		$Password = 'love6406';
		$DBName = 'tiandump';
		if (@mysql_connect($sqlServerIp, $UserName, $Password)){
			mysql_query("SET NAMES utf8");
			if (! @mysql_select_db($DBName)){
				exit("<script>alert('SQL Server connected , But database could not open')</script>");
			}
		}else{
			exit("<script>alert('Can not connect SQL Server')</script>");
		}
	}else{
		exit("<script>alert('Can not connect SQL Server')</script>");
	}
}
?>